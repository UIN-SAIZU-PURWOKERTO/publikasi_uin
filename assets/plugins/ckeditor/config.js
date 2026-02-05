/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	
	config.filebrowserBrowseUrl         = '../assets/vendors/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl    = '../assets/vendors/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl    = '../assets/vendors/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl         = '../assets/vendors/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl    = '../assets/vendors/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl    = '../assets/vendors/kcfinder/upload.php?type=flash';
	
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
