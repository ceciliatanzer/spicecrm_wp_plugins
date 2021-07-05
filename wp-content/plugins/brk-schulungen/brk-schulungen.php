<?php
/**
 * @package CTPlugin
 */
/**
 * Plugin Name: BRK Schulungen
 * Plugin URI: http://127.0.0.1/wordpress
 * Description: Liste von verfügbare Schulungen und buchen.
 * Version: 1.0.0
 * Author: CT
 * Author URI: http://127.0.0.1/wordpress
 * License: GPLv2
 */

//security check(exit if directly accessed)
if ( ! defined('ABSPATH' ) ){
    die;
}
//define shortcode
    function brk_schulung(){

    }
    add_shortcode('brkschulung','brk_schulung');

//define variable for path to this plugin file
define( 'BRK_SCHULUNGEN', dirname( __FILE__));
define( 'BRK_SCHULUNGEN_URL', plugins_url('__FILE__'));



class BrkSchulung
{
    function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue') );
    }

   function enqueue(){
       wp_enqueue_style('mypluginstyle' , plugins_url( '/assets/mystyle.css' , __FILE__) );
       wp_enqueue_script('mypluginscript' , plugins_url( '/assets/myskripts.js' , __FILE__) );
   }


}

if ( class_exists('BrkSchulung')){
    $brkSchulung = new BrkSchulung();
    $brkSchulung->register();
}

//get data from json  put it in table
$json = '[{"kurs":"Erstehilfe",
           "freiplatz":"12",
           "begin":"januar",
           "preis":"129 euro",
           "id":"1",
           "details":"details Erstehilfekurs"},
           {"kurs":"Altespflege",
           "freiplatz":"20",
           "begin":"märz",
           "preis":"170 euro",
           "id":"2",
           "details":"details Altespflegkurs"},
           {"kurs":"Kinderbetreuer",
           "freiplatz":"7",
           "begin":"september",
           "preis":"234 euro",
           "id":"3",
           "details":"details Kinderbetreuerskurs"},
           {"kurs":"Heimhilfe",
           "freiplatz":"3",
           "begin":"mai",
           "preis":"50 euro",
           "id":"4",
           "details":"details Heimhilfekurs"}
           ]';
$json_decoded = json_decode($json);
?>
<table class="table table-striped">

    <tr>
        <th>Kurs</th>
        <th>Plätze</th>
        <th>Kurs begin</th>
        <th>Preis</th>
    <tr>

<?php
// $id = $result->id;
// echo $id;
    foreach($json_decoded as $result){ ?>

    <tr>
        <td><?php echo $result->kurs?></td>
        <td><?php echo $result->freiplatz?></td>
        <td><?php echo $result->begin?></td>
        <td><?php echo $result->preis?></td>
        <td><a href="<?php echo $result->details;?>">Details</a></td>
    </tr>


<?php }
    ?>
</table>







