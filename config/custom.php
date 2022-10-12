<?php
return [
    'per_page' =>200,
    'status' =>[
        '1' => 'Active',
        '2' => 'Deactive'
    ],
    'user_types' =>[
        '1' => 'Admin',
        '2' => 'Teacher',
        '3' => 'Student',
    ],
    'image_folders' => [
        '1' => 'student',
        '2' => 'course_material',
        '3'=>'DOCX',
        '4'=>'quiz_image',
    ],
    'genders' =>[
        '1' => 'Male',
        '2' => 'Female',
        '3' => 'Other',
    ],
    'states' =>[
        '1' => 'Yes',
        '2' => 'No'
    ],
    'question_types' =>[
        '1' => 'Text',
        '2' => 'Image'
    ],
    'no_of_options' =>[
        '4' => '4',
        '5' => '5'
    ],
    'setting_types'=>[
        '1'=>'DOCX',
        '2'=>'VIDEO'
    ],
    'installment_types' => [
        '1' => 'First Installment',
        '2' => 'Second Installment',
        '3' => 'Third Installment'
    ],
    'transaction_types' => [
        '1' => 'Income',
        '2' => 'Discount',
        '3' => 'Refund'
    ],
    'payment_status' => [
        '1' => 'Paid',
        '2' => 'Unpaid'
    ],
    'bank_status' => [
        '1' => 'Verified',
        '2' => 'Unverified'
    ],
    'report_types' => [
        '1' => 'show',
        '2' => 'pdf',
        '3' => 'excel'
    ],
    'due_days' => [
        'Over' => 'Over Dues',
        '0' => '0 days',
        '1' => '1 days',
        '2' => '2 days',
        '3' => '3 days',
        '4' => '4 days',
        '5' => '5 days',
    ],

]




?>
