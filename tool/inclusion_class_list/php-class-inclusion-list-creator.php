<?php

/* Configuration */
$sTargetBaseDir		= dirname( dirname( dirname( __FILE__ ) ) );
$sResultFilePath	= $sTargetBaseDir . '/include/class-list.php';

/* If accessed from a browser, exit. */
$bIsCLI				= php_sapi_name() == 'cli';
$sCarriageReturn	= $bIsCLI ? PHP_EOL : '<br />';
if ( ! $bIsCLI ) { exit; }

/* Include necessary files */
require( dirname( __FILE__ ) . '/class/PHP_Class_Files_Inclusion_List_Creator.php' );

/* Check the permission to write. */
if ( ! file_exists( $sResultFilePath ) ) {
	file_put_contents( $sResultFilePath, '', FILE_APPEND | LOCK_EX );
}
if ( 
	( file_exists( $sResultFilePath ) && ! is_writable( $sResultFilePath ) )
	|| ! is_writable( dirname( $sResultFilePath ) ) 	
) {
	exit( sprintf( 'The permission denied. Make sure if the folder, %1$s, allows to modify/create a file.', dirname( $sResultFilePath ) ) );
}

/* Create a minified version of the framework. */
echo 'Started...' . $sCarriageReturn;

// for the boot files
new PHP_Class_Files_Inclusion_Script_Creator(
	$sTargetBaseDir,
	array( $sTargetBaseDir . '/include/core/' ), 	// scan directory paths
	$sResultFilePath, 
	array(
		// 'header_class_name'	=>	'TaskScheduler_InclusionScriptHeader',
		'output_buffer'		=>	true,
		'header_type'		=>	'CONSTANTS',	
		// 'exclude_classes'	=>	array( 'TaskScheduler_InclusionScriptHeader', 'TaskScheduler_MinifiedVersionHeader' ),
		'output_var_name'	=>	'$_aClassFiles',		
		'base_dir_var'  	=>	'AmazonAutoLinks_Registry::$sDirPath',
		'search'			=>	array(
			'allowed_extensions'	=>	array( 'php' ),	// e.g. array( 'php', 'inc' )
			// 'exclude_dir_paths'		=>	array( $sTargetBaseDir . '/include/class/backend' ),
			'exclude_dir_names'		=>	array( 'v2', 'function' ),
			'is_recursive'			=>	true,
		),			
	)
);

echo 'Done!' . $sCarriageReturn;