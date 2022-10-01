<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shop Language PL
    |--------------------------------------------------------------------------
    */
    'index' => [
        'products' => 'Produkty',
        'categories' => 'Kategorie',
        'price' => 'Cena',
        'update_results' => 'Filtruj'
    ],
    'menu' => [
        'products_list' => 'Lista produktów',
        'users_list' => 'Lista użytkowników'
    ],
    'columns' => [
        'action' => 'Akcje'
    ],
    'messages' => [
        "confirm_delete_title" => 'Czy napewno chcesz usunąć rekord?',
        "confirm_delete_text" => 'Nie będziesz mógł tego cofnąć!',
        "confirm_button_text" => 'Tak',
        "cancel_button_text" => 'Nie',
        "fail_text" => 'Coś poszło nie tak!',
        "cancel_title" => 'Anulowano',
        "cancel_text" => 'Twój rekord jest bezpieczny'
    ],
    'button' => [
        'save' => 'Zapisz',
        'add' => 'Dodaj produkt'
    ],
    'user' => [
        'index_title' => 'Lista użytkowników',
        'status' => [
            'delete' => [
                'success' => 'Użytkownik usunięty!'
            ],
        ],
    ],
    'product' => [
        'add_title' => 'Dodawanie produktu',
        'edit_title' => 'Edycja produktu: :name',
        'show_title' => 'Podgląd produktu',
        'index_title' => "Lista produktów",
        'status' => [
            'save' => [
                'success' => 'Produkt zapisany!'
            ],
            'update' => [
                'success' => 'Produkt zaktualizowany!'
            ],
            'delete' => [
                'success' => 'Produkt usunięty!'
            ],
        ],
        'fields' => [
            'name' => 'Nazwa',
            'description' => 'Opis',
            'amount' => 'Ilość',
            'price' => 'Cena',
            'image' => 'Grafika',
            'category' => 'Kategoria'
        ]
    ]
];
