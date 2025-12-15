<?php

return [
    // Navbar
    'nav' => [
        'inventory' => 'Inventory',
        'transaction' => 'Transaction',
    ],

    // Inventory
    'inventory' => [
        'title' => 'Inventory',

        'category' => [
            'material' => 'Material',
            'chemicals' => 'Chemicals',
            'raw_parts' => 'Raw Parts',
            'consumables' => 'Consumables',
        ],

        'col' => [
            'code' => 'Code',
            'type' => 'Type',
            'description' => 'Description',
            'size' => 'Size',
            'brand' => 'Brand',
            'price' => 'Price',
            'stock' => 'Stock',
        ],

        'detail' => [
            'title' => 'Product Detail',
            'commercial' => 'Commercial',
            'price' => 'Price',
            'unit' => 'Unit',
            'stock' => 'Stock',
            'desc' => 'More data regarding the product',
            'brand' => 'Brand',
            'product_desc' => 'Description',
            'size' => 'Size',
            'hs_code' => 'HS Code',
            'origin' => 'Origin',
            'sch' => 'SCH',
            'material_family' => 'Material Family',
            'need_lartas' => 'Need LARTAS',
            'need_sni' => 'Need SNI',
        ],

        'create' => [
            'title' => 'Create Product',
            'header' => 'Create Product',
            'desc' => 'Input data of the product to add it into Inventory.',

            'identity' => [
                'h2' => 'Product Identity',
                'h3' => 'Choose Product Type',
                'h3_desc' => 'Some products have different details to be inputted.',

                'type' => [
                    'consumables' => 'Consumables',
                    'chemicals' => 'Chemicals',
                    'raw_parts' => 'Raw Parts',
                    'materials' => 'Materials',
                ],

                'input' => [
                    'desc' => 'Product Description',
                ],
            ],

            'specification' => [
              'h3' => 'Technical Specification',
              'h3_desc' => 'Input technical informations regarding the product such as type, unit, category, etc.',
              'additional' => 'You can choose more than one',
              'size' => 'Size',
              'unit' => 'Unit',
              'material' => 'Material'
            ],

            'commercial' => [
              'h3' => 'Product Commercial',
              'h3_desc' => 'Input commercial informations regarding the product.',
              'input' => [
                'price' => 'Price per Unit',
                'stock' => 'Stock',
              ],
            ],

            'submit' => 'Add Product'
        ],

        'edit' => [
          'h3' => "Update Product",
          'h3_desc' => "Update product information in inventory.",
          'submit' => 'Save Changes'
        ]
    ],

    // Transactions
    'transactions' => [
        'title' => 'Transactions',

        'col' => [
            'code' => 'Code',
            'seller' => 'Seller',
            'buyer' => 'Buyer',
            'date' => 'Date',
            'status' => 'Status',
        ],

        'detail' => [
            'title' => 'Transaction Detail',
            'date_made' => 'Created Date',
            'name' => 'Name',
            'address' => 'Address',
            'price_h3' => 'Price Details',
            'price_h3_desc' => 'Calculation of all the products in the transaction.',
            'subtotal' => 'Subtotal',
            'tax' => 'Tax',
        ],

        'create' => [
            'title' => 'Create Transaction',
            'header' => 'Create Transaction',
            'desc' => 'Input data of the product to create a new Transaction.',

            'information' => [
                'h2' => 'Transaction Information',
                'h3' => 'Choose Product Type',
                'h3_desc' => 'Some products have different details to be inputted.',

                'h4' => 'Choose Product',
                'h4_desc' => 'Choose products that will be included in the transaction.',

                'type' => [
                    'consumables' => 'Consumables',
                    'chemicals' => 'Chemicals',
                    'raw_parts' => 'Raw Parts',
                    'materials' => 'Materials',
                ],

                'input' => [
                    'company_name' => 'Company Name',
                    'company_address' => 'Company Address',
                ],
            ],

            'submit' => 'Done'
        ],

        'edit' => [
          'h3' => "Update Transaction",
          'h3_desc' => "Update chosen transaction information.",
          'submit' => 'Save Changes'
        ]
    ],

    // User
    'user' => [
        'title' => 'User Management',

        'col' => [
            'user_info' => 'User Info',
            'user_role' => 'User Role',
            'user_last_update' => 'Last Changed',
        ],

        'detail' => [
            'title' => 'User Detail',
            'date_made' => 'Created Date',
            'name' => 'Name',
            'address' => 'Address',
            'price_h3' => 'Price Details',
            'price_h3_desc' => 'Calculation of all the products in the transaction.',
            'subtotal' => 'Subtotal',
            'tax' => 'Tax',
        ],

        'create' => [
            'title' => 'Create User',
            'desc' => 'Enter the required information to add a new user.',
            'submit' => 'Create User'
          ],

        'edit' => [
            'title' => 'User Detail',

            'information' => [
                'date_joined' => 'Joined Date',
                'last_changed' => 'Last Changed',
                'usn' => 'Username',
                'email' => 'Email',
                'phone' => 'Phone Number',
                'role' => 'Role',
                'submit' => "Save",
                'password' => "Password"
            ],
        ],
    ],

    // Login
    'login' => [
        'title' => 'Login',
        'header' => 'Welcome Back!',
        'header_desc' => 'Input your Track-In account credentials to use the app!',
        'input' => [
            'email' => 'Email',
            'pass' => 'Password',
            'remember_me' => 'Remember Me',
            'submit' => 'Submit',
            'has_acc' => 'Do not have an account?',
            'login' => 'Register',
        ],
        'footer' => '© Copyright Track-In 2025. All Rights Reserved',
    ],

    // Register
    'register' => [
        'title' => 'Register',
        'header' => 'Register Account',
        'header_desc' => 'Register to Track-In to view products and transactions.',
        'input' => [
            'full_name' => 'Full Name',
            'email' => 'Email',
            'pass' => 'Password',
            'remember_me' => 'Remember Me',
            'submit' => 'Submit',
            'has_acc' => 'Has an account?',
            'login' => 'Login',
        ],
        'footer' => '© Copyright Track-In 2025. All Rights Reserved',
    ],

    'deleteModal' => [
      'title' => 'Are you sure?',
      'desc' => 'Are you sure you want to delete this data? This action is permanent and cannot be undone.',
      'confirm' => 'Yes, I am sure',
      'decline' => 'No, Cancel',
    ],

    // Utils
    'utils' => [
        'search' => 'Search...',
        'filter' => 'Select Filter',
        'stock' => [
            'low' => 'Stock Low',
            'medium' => 'Stock Medium',
            'ready' => 'Stock Ready',
        ],
        'add' => 'Add',
        'page' => 'Page',
        'of' => 'of',
        'admin' => 'Administrator',
        'user' => 'User',
        'units' => 'Units',
        'total' => 'Total',
        'chosen' => 'Chosen'
    ],

    // status-dropdown =>
    'status-dropdown' => [
        'title' => "Change Status",
        'pending' => [
            'title' => 'Pending',
            'description' => 'Item has been added and not processed yet.',
        ],
        'on-delivery' => [
            'title' => 'On Delivery',
            'description' => 'Item is being delivered.',
        ],
        'waiting-payment' => [
            'title' => 'Waiting for Payment',
            'description' => 'Payment has not been received.',
        ],
        'completed' => [
            'title' => 'Completed',
            'description' => 'Transaction has been completed.',
        ],
    ],

    'transaction-status' => [
        'pending' => "Pending",
        'on-delivery' => 'On Delivery',
        'waiting-payment' => "Payment",
        'completed' => "Completed"
    ],

    'error_message' => [
        'transaction_not_found' => "Transaction Not Found",
        'transaction_not_found_desc' => "There is no transaction found",

        'product_not_found' => "Product Not Found",
        'product_not_found_desc' => "There is no product found",

        'user_not_found' => "User Not Found",
        'user_not_found_desc' => "There is no user found",
    ]
];
