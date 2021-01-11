<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public static function jsonResponse(){

        $countries = Country::all('id', 'parent_id', 'text', 'position')->sortBy(['parent_id', 'position']);
        $data = $countries->toArray();

        $itemsByReference = array();

        foreach($data as $key => &$item) {

            $itemsByReference[$item['id']] = &$item;

            $itemsByReference[$item['id']]['children'] = array();

            $itemsByReference[$item['id']]['data'] = new \StdClass();
        }


        foreach($data as $key => &$item)
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;


        foreach($data as $key => &$item) {
            if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($data[$key]);
        }

        return response()->json($data);
    }

    public static function jsonAddNode(Request $request){

        $data = $request->toArray();
        $country = new Country();
        $country->text = $data['nazwa'];
        $country->parent_id = $data['rodzic'];

        try{
            $country->save();

            $countries = Country::all('id', 'parent_id', 'text');

            return response()->json([
                    'status'    => 'success',
                    'countries' => $countries->toArray(),
                    'response'  => 'Dodano pomyślnie',
                ]
            );
        }
        catch(\Exception $e){
            return response()->json([
                'status'    => 'error',
                'response'  => $e->getMessage()
            ]);
        }


    }

    public static function jsonMoveNode(Request $request){
        $data = $request->toArray();
        $oldChangedId = str_replace('_anchor', '', $data['changedWith']);

        $newChangedId = $data['ids'][0];
        $movedCountry = Country::findOrFail($newChangedId);
        $oldChangedCountry = Country::findOrFail($oldChangedId);
        $newPosition = $oldChangedCountry->position;

        try{
            if($oldChangedCountry->parent_id == $movedCountry->parent_id){

                if($movedCountry->position < $oldChangedCountry->position){
                    self::changePositionSameBranch($movedCountry, $oldChangedCountry, 'down');
                }
                elseif($movedCountry->position > $oldChangedCountry->position){
                    self::changePositionSameBranch($oldChangedCountry, $movedCountry, 'up');
                }
            }
            else{
                self::changePositionOtherBranch($movedCountry, 'down');
                self::changePositionOtherBranch($oldChangedCountry, 'up');
                $movedCountry->parent_id = $oldChangedCountry->parent_id;
            }

            $movedCountry->position = $newPosition;
            $movedCountry->save();

            return response()->json([
                'status'    => 'success',
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status'    => 'error',
                'response'  => $e->getMessage()
            ]);
        }

    }

    public static function changePositionOtherBranch(Country $moved, $type){
        $positonsToMoveBack = Country::where('parent_id',  $moved->parent_id)
            ->where('position', '>=', (int)$moved->position)
            ->get();

        if(count($positonsToMoveBack)){
            foreach($positonsToMoveBack as $country){
                if($type=='down')
                    --$country->position;
                else
                    ++$country->position;

                $country->save();
            }
        }
    }

    public static function changePositionSameBranch(Country $start, Country $stop, string $type){
        $positonsToMoveBack = Country::where('parent_id',  $start->parent_id)
            ->where('position', '>=', (int)$start->position)
            ->where('position', '<=', (int)$stop->position)
            ->get();

        if(count($positonsToMoveBack)){
            foreach($positonsToMoveBack as $country){
                if($type=='down')
                    --$country->position;
                else
                    ++$country->position;

                $country->save();
            }
        }
    }

    public static function jsonChangeNode(Request $request){
        $data = $request->toArray();
        $country = Country::findOrFail($data['id_wezla']);
        $country->text = $data['nowa_nazwa'];

        try{
            $country->save();
            $countries = Country::all('id', 'parent_id', 'text');

            return response()->json([
                    'status'    => 'success',
                    'countries' => $countries->toArray(),
                    'response'  => 'Zmieniono nazwę',
                ]
            );
        }
        catch(\Exception $e){
            return response()->json([
                'status'    => 'error',
                'response'  => $e->getMessage()
            ]);
        }


    }

    public static function jsonDeleteNode(Request $request){
        $data = $request->toArray();
        $country = Country::findOrFail($data['id_wezla']);

        try{
            $country->delete();
            $countries = Country::all('id', 'parent_id', 'text');

            return response()->json([
                    'status'    => 'success',
                    'countries' => $countries->toArray(),
                    'response'  => 'Usunięto węzeł',
                ]
            );
        }
        catch(\Exception $e){
            return response()->json([
                'status'    => 'error',
                'response'  => $e->getMessage()
            ]);
        }
    }


}
