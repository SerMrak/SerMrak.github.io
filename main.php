<?php
function fix_user_data($user_data) {
    try {
        if (!is_array($user_data)) {
            throw new Exception("User data must be an array");
        }
        
        // Check if user data contains the necessary fields
        if (!isset($user_data['name']) || !isset($user_data['surname']) || !isset($user_data['patronymic']) || !isset($user_data['phone number']) || !isset($user_data['password'])) {
            throw new Exception("User data must contain name, phone number, and password fields");
        }
        
        // Fix any data issues
        $user_data['name'] = ucwords(strtolower($user_data['name']));
        $user_data['surname'] = ucwords(strtolower($user_data['surname']));
        $user_data['patronymic'] = ucwords(strtolower($user_data['patronymic']));
        $user_data['phone numder'] = strtolower($user_data['phone number']); 
        $user_data['password'] = strtolower($user_data['password']); 
        
        // Return the fixed user data
        return $user_data;
    } catch (Exception $e) {
        // Log the error
        error_log("Error: " . $e->getMessage());
        
        // Return an empty array
        return array();
    }
}
?>