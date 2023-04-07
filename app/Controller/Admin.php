<?php

namespace Controller;

use src\View;
use src\Request;
use Model\Room;
use Model\Division;
use Model\Rooms_view;

use src\Validator\Validator;

class Admin
{ 
    public function room(Request $request): string
    {
        $rooms = Room::all();
        $divisions = Division::all();
        $roomsView = Rooms_view::all();
        if ($request->method === 'GET') {
            return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]); 
        }
        //поиск
        if ($request->method === 'POST' && $request->get('type_form') == 'search') {
            $rooms = Room::where('number', '=', $request->get('number'))->get();
            return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]);
        }
        //удаление
        if ($request->method === 'POST' && $request->get('type_form') == 'delete') {
            Room::where('id', '=', $request->get('delete_id'))->delete();
            app()->route->redirect('/places');
        }
        //Подсчет мест
        if ($request->method === 'POST' && $request->get('type_form') == 'countPlaces') {
            // все
            if ($request->get('id_division') == 0) {
                $roomsCountPlaces = Room::all();
                $summ = 0;
                foreach ($roomsCountPlaces as $place) {
                    $summ += $place->places;
                }
                return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]); 
            }
            // остальные
            if ($request->get('id_division') != 0) {
                
                $roomsCountPlaces = Room::where('id_division', '=', $request->get('id_division'))->get();
                $summ = 0;
                foreach ($roomsCountPlaces as $place) {
                    $summ += $place->places;
                }

                return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]);
            }
        }
        //площадь
        if ($request->method === 'POST' && $request->get('type_form') == 'square') {
            // все
            if ($request->get('id_view') == 0) {
                $roomsSquare = Room::all();
                $square = 0;
                foreach ($roomsSquare as $place) {
                    $square += $place->square;
                }
                return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]); 
            }
            // остальные
            if ($request->get('id_view') != 0) {
                
                $roomsSquare = Room::where('id_view', '=', $request->get('id_view'))->get();
                $square = 0;
                foreach ($roomsSquare as $place) {
                    $square += $place->square;
                }

                return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]);
            }
        }
        //Фильтр
        if ($request->method === 'POST' && $request->get('type_form') == 'filter') {
            if ($request->get('id_division') == 0) {
                app()->route->redirect('/places');
            }
            if ($request->get('id_division') != 0) {
                $rooms = Room::where('id_division', '=', $request->get('id_division'))->get();
                return (new View())->render('site.room', ['rooms' => $rooms, 'divisions' => $divisions, 'roomsView' => $roomsView, 'summ' => $summ, 'square' => $square]); 
            }
        }
    }

    public function addRoom(Request $request): string
    {
        $rooms = Room::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'number' => ['required'],
                'id_view' => ['select'],
                'square' => ['required', 'select'],
                'places' => ['required', 'select'],
                'id_division' => ['select'],                
            ], [
                'required' => 'Поле :field пусто',
                'select' => 'Не выбрано значение в поле :field'
            ]);

            if ($validator->fails()) {
                return new View('site.room', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'rooms' => $rooms]);
            }
            
            if (Room::create($request->all())) {
                app()->route->redirect('/places');
            }
           
        }
    }

    public function division(Request $request): string
    {
        $divisions = Division::all();
        if ($request->method === 'POST' && $request->get('type_form') == addRoom) {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'id_view' => ['select']
            ], [
                'required' => 'Поле :field пусто',
                'select' => 'Вы не выбрали значение в поле :field'
            ]);

            if ($validator->fails()) {
                return new View('site.division', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'divisions' => $divisions]);
            }

            if (Division::create($request->all())) {
                app()->route->redirect('/divisions');
            }
        }
        if ($request->method === 'GET') {
            return (new View())->render('site.division', ['divisions' => $divisions]); 
        }
    }
}