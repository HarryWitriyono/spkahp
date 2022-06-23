function debugLog($o) {
 $file_debug = 'log/' . 'debug-h2h-' . date("Y-m-d") . '.log'; 
 $file_bulan = 'log/' . 'logbnis' . date("Y-m") . '.log';
 ob_start();
 var_dump($o);
 $c = ob_get_contents();
 ob_end_clean();

 $f = fopen($file_debug, "a+");
 $fbul=fopen($file_bulan, "a+");
	
 fputs($f, "$c\n");
 fputs($fbul,"$c\n");
	
 fflush($f);
 fflush($fbul);
	
 fclose($f);
 fclose($fbul);
}