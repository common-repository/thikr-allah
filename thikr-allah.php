<?php
/**
 * @package thikr_allah
 * @version 1.0
 */
/*
Plugin Name: Thikr allah
Description: When we are working in the admin dashboard we forgot tikr allah , this plugin in cha allah will help you remember the tikr with short thikr statments,(This plugin based in Hello Dolly idea)
Version: 1.0
Author URI: http://thexlearning.com/betheme2/
*/
function thikr_allah_get_thikr() {
	/** These are the thikr to thikr allah */
	$thikr = "سبحان الله وبحمده
اللهم آتنا في الدنيا حسنة وفي الآخرة حسنة وقنا عذاب النار
حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم
اللهم أجرني من النار
اللهم مصرف القلوب صرف قلوبنا على طاعتك
أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق
اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد
رب أنى ظلمت نفسى فاغفر لى,انه لا يغفر الذنوب الا انت
ربنا آتنا ثواب الدنيا و حسن ثواب الآخرة
اللهم انك عفو كريم تحب العفو فاعف عنا
لا اله الا انت سبحانك انى كنت من الظالمين
اللهم أجعلنا من الذين يستمعون القول فيتبعون أحسنه
يَا رَبِّ , لَكَ الْحَمْدُ كَمَا يَنْبَغِي لِجَلَالِ وَجْهِكَ , وَلِعَظِيمِ سُلْطَانِكَ";
	// Here we split it into lines
	$thikr = explode( "\n", $thikr );
	// And then randomly choose a line
	return wptexturize( $thikr[ mt_rand( 0, count( $thikr ) - 1 ) ] );
}
// This just echoes the chosen line, we'll position it later
function thikr_allah() {
	$chosen = thikr_allah_get_thikr();
	echo "<p id='thikr'>$chosen</p>";
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'thikr_allah' );
// We need some CSS to position the paragraph
function thikr_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#thikr {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 10px;
		margin: 0;
                border-radius: 5px;
                height: 22px;
                line-height: 22px;
                border-top: none;
                border: 1px solid #ddd;
                background: #fff;
		font-size: 20px;
                border-top-left-radius: 0px;
                border-top-right-radius: 0px;       
               	}
        @media screen and (max-width: 750px) {#thikr {visibility: hidden;} }
	</style>
	";
}
add_action( 'admin_head', 'thikr_css' );
?>
