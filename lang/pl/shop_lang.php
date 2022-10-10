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
        'add_title' => 'Dodaj użytkownika',
        'edit_title' => 'Edycja użytkownika: :email',
        'show_title' => 'Pokaż użytkownika',
        'index_title' => 'Lista użytkowników',
        'status' => [
            'save' => [
                'success' => 'Użytkownik został zapisany!'
            ],
            'update' => [
                'success' => 'Dane użytkownika zostały zaktualizowane!'
            ],
            'delete' => [
                'success' => 'Użytkownik został usunięty!'
            ],
        ],
        'fields' => [
            'name' => 'Imie',
            'surname' => 'Nazwisko',
            'phone' => 'Telefon',
            'email' => 'Email',
            'city' => 'Miasto',
            'zip_code' => 'Kod pocztowy',
            'street' => 'Ulica',
            'street_no' => 'Numer ulicy',
            'home_no' => 'Numer domu'
        ]
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
