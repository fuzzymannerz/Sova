<?php
function phpExCheck($extensions) {
    $fail = '';
    $pass = '';
    
    if(version_compare(phpversion(), '5.4.0', '<')) {
        $fail .= '<li>You need<strong> PHP 5.4.0</strong> or greater. (Current: <strong class="red-text">' .phpversion(). '</strong></li>';
    } else {
        $pass .='<li>You have<strong class="green-text"> PHP ' .phpversion(). '</strong> installed.</li>';
    }
    foreach($extensions as $extension) {
        if(!extension_loaded($extension)) {
            $fail .= '<li> You are missing the <strong>'.$extension.'</strong> PHP extension!</li>';
        } else{ $pass .= '<li><strong>'.$extension.'</strong> <span class="green-text"> PHP extension installed.</span></li>';
        }
    }

    //Check to see if config exists and is writable
    if (file_exists("../../php/config.php")) {
        if (is_writable('../../php/config.php')){
        $pass .='<li><strong>~/php/config.php</strong> <span class="green-text">is writable</span>.</li>';
        }
        else{
        $fail .= '<li><strong>~/php/config.php</strong> <span class="red-text">is not writable!</span></li>';
        }
    }
    elseif (!file_exists("../../php/config.php")) {
        $fail .= '<li><strong>~/php/config.php</strong> <span class="red-text">file does not exist!</span></li>';
    }

    //Check to see if img DIR exists and is writable
    if (file_exists("../img")) {
        if (is_writable('../img')){
        $pass .='<li><strong>~/public/img</strong> <span class="green-text">is writable.</span></li>';
        }
        else{
        $fail .= '<li><strong>~/public/img</strong> <span class="red-text">is not writable!</span></li>';
        }
    }
    elseif (!file_exists("../img")) {
        $fail .= '<li><strong>~/public/img</strong> <span class="red-text">directory does not exist!</span></li>';
    }

    // Check for file_uploads in php.ini 
    if (ini_get('file_uploads') == 1) {
        $pass .='<li><i>(optional)</i> <strong>PHP file_uploads</strong> is <span class="green-text">ON</span>.</li>';
        $pass .='<li><i>(optional)</i> <strong>PHP upload_max_filesize</strong> is <span class="green-text">'.ini_get('upload_max_filesize').'</span>.</li>';
    }
    elseif (ini_get('file_uploads') == 0) {
        $pass .='<li><i>(optional)</i> <strong>PHP file_uploads</strong> is <span class="orange-text">OFF</span>.</li>';
    }
    
    
    // Show fail or success
    if($fail) {
        echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR!</h4>';
        echo '<br>The following requirements failed:';
        echo '<ul>'.$fail.'</ul></p>';
        echo 'The following requirements were successful:';
        echo '<ul>'.$pass.'</ul>';
        exit;
    } else {
        echo '<i class="large material-icons green-text">done</i><br><h4 class="center green-text">SUCCESS!</h4>';
        echo '<ul>'.$pass.'</ul>';
    }
}
phpExCheck(array( 
    'pdo', 
    'pdo_mysql'
));

?>