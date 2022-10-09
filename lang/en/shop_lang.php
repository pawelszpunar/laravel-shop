<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shop Language PL
    |--------------------------------------------------------------------------
    */
    'index' => [
        'products' => 'Products',
        'categories' => 'Categories',
        'price' => 'Price',
        'update_results' => 'Update results'
    ],
    'menu' => [
        'products_list' => 'Products list',
        'users_list' => 'Users list'
    ],
    'columns' => [
        'action' => 'Actions'
    ],
    'messages' => [
        "confirm_delete_title" => 'Are you sure you want to delete the record?',
        "confirm_delete_text" => 'You won\'t be able to revert this!',
        "confirm_button_text" => 'Yes, delete it!',
        "cancel_button_text" => 'No, keep it!',
        "fail_text" => 'Something went wrong!',
        "cancel_title" => 'Cancelled',
        "cancel_text" => 'Your record is safe :)'
    ],
    'button' => [
        'save' => 'Save',
        'add' => 'Add product'
    ],
    'user' => [
        'add_title' => 'Add user',
        'edit_title' => 'Edit user: :email',
        'show_title' => 'Preview user',
        'index_title' => "Users list",
        'status' => [
            'save' => [
                'success' => 'User saved!'
            ],
            'update' => [
                'success' => 'User updated!'
            ],
            'delete' => [
                'success' => 'User deleted!'
            ],
        ],
        'fields' => [
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'email' => 'Email',
            'city' => 'City',
            'zip_code' => 'Zip code',
            'street' => 'Street',
            'street_no' => 'Street no',
            'home_no' => 'Home no'
        ]
    ],
    'product' => [
        'add_title' => 'Add product',
        'edit_title' => 'Edit product: :name',
        'show_title' => 'Preview product',
        'index_title' => "Products list",
        'status' => [
            'save' => [
                'success' => 'Product saved!'
            ],
            'update' => [
                'success' => 'Product updated!'
            ],
            'delete' => [
                'success' => 'Product deleted!'
            ],
        ],
        'fields' => [
            'name' => 'Name',
            'description' => 'Description',
            'amount' => 'Amount',
            'price' => 'Price',
            'image' => 'Image',
            'category' => 'Category'
        ]
    ]
];
