<?php
$css = 'index.css'
?>
<?php
$newPassword = "";
function random_char( $str )
{
    $length = strlen( $str );
    $position = mt_rand( 0, $length -1 );
    return $str[ $position ];
};

function random_string( $charset_str, $len )
{
    $pass = "";
    
    for( $i = 0; $i < $len; $i++ ){
        $pass .= random_char( $charset_str );
    };
    return $pass;
}

function ascii()
{
    $allascii = "";
    for ( $i = 32; $i <128; $i++ ){
        $allascii .= chr( $i );
    } 
    return $allascii;
}

if ( isset( $_POST['number'] ) && $_POST['number'] != null &&  $_POST['number'] < 32 ){
    mt_srand( (double) microtime() * 10000000 );
    $getallascii = ascii();
    $newPassword = random_string( $getallascii, $_POST['number'] );

} else {
    /*  
         upps ;)
    
    */
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo $css?>>
    <title>Password</title>
</head>
<body>
<div class="container">
    <div class="generator">
        <form class="generator__form" action="index.php" method="post">
            <input type="text" class="generator__form__input generator__form__input--text1" name="number" placeholder="Długość hasła">
            <input type="text" class="generator__form__input generator__form__input--text2" name="viewpass" value="<?php echo $newPassword; ?>">
            <input type="submit" class="generator__form__input generator__form__input--submit" name="gen" value="generuj">            
        </form>
    </div>
</div>    
</body>
</html>