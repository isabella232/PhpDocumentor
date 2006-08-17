<?php
set_time_limit(0);
require_once('PEAR/PackageFileManager.php');
require_once('PEAR/PackageFileManager2.php');
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagedir = dirname(dirname(__FILE__));
$notes = 'PHP 5 support and more, fix bugs

This release fixes a large number of bugs, and switches
to the LGPL license instead of the PHP License.

This will be the last release in the 1.x series.  2.0 is next

Features added to this release include:

 * Full PHP 5 support, phpDocumentor both runs in and parses Zend Engine 2
   language constructs.  Internal classes are recognized and inheritance is
   documented.  Note that you must be running phpDocumentor in
   PHP 5 in order to parse PHP 5 code
 * XML:DocBook/peardoc2:default converter now beautifies the source using
   PEAR\'s XML_Beautifier if available
 * inline {@example} tag - this works just like {@source} except that
   it displays the contents of another file.  In tutorials, it works
   like <programlisting>
 * customizable README/INSTALL/CHANGELOG files
 * phpDocumentor tries to run .ini files out of the current directory
   first, to allow you to put them anywhere you want to
 * multi-national characters are now allowed in package/subpackage names
 * images in tutorials with the <graphic> tag
 * un-modified output with <programlisting role="html">
 * html/xml source highlighting with <programlisting role="tutorial">

From both Windows and Unix, both the command-line version
of phpDocumentor and the web interface will work
out of the box by using command phpdoc - guaranteed :)

WARNING: in order to use the web interface through PEAR, you must set your
data_dir to a subdirectory of your document root.

$ pear config-set data_dir /path/to/public_html/pear

on Windows with default apache setup, it might be

C:\> pear config-set data_dir "C:\Program Files\Apache\htdocs\pear"

After this, install/upgrade phpDocumentor

$ pear upgrade phpDocumentor

and you can browse to:

http://localhost/pear/PhpDocumentor/

for the web interface

------
WARNING: The PDF Converter will not work in PHP5.  The PDF library that it relies upon
segfaults with the simplest of files.  Generation still works great in PHP4
------

- WARNING: phpDocumentor installs phpdoc in the
  scripts directory, and this will conflict with PHPDoc,
  you can\'t have both installed at the same time
- Switched to Smarty 2.6.0, now it will work in PHP 5.  Other
  changes made to the code to make it work in PHP 5, including parsing
  of private/public/static/etc. access modifiers
- fixed these bugs since 1.3.0RC6:
 [ 941146 ] Repeated sub-tutorials
 [ 1223413 ] improper load sequence when using custom templatebase
 [ 1481118 ] Tags with more than one attribute keep only the first one.
 [ 1485448 ] Mixing {@toc} and DOCTYPE for DocBook gives PHP fatal error
 [ 1486304 ] unexpected parameter type mixed
 [ 1490000 ] Javascript in header.tpl cause httpd log: File not found
 [ 1491119 ] Inexistant --directory leads to obscure error message
 [ 1492100 ] Warning: fread(): Length parameter must be greater than 0
 [ 1492101 ] Object of class parserLinkInlineTag could not be converted
 [ 1492538 ] ERROR: Converter X specified by ... is not a class
 [ 1492608 ] PHP Notices in current CVS
 [ 1497452 ] Fatal error: Call to undefined method parserFunction::setMo
 [ 1512969 ] Call to a member function cantSource() on a non-object
 [ 1516781 ] Use of undefined constant T_ML_COMMENT - assumed \'T_ML_COMME
 [ 1524102 ] Weird include documentation
 [ 1528752 ] Trivial typo in "phpDocumentor Inline tags" documentation
 [ 1533361 ] trailing comments stop phpdoc on source generation
 [ 1532841 ] \'%\' in function parameter default value causes errors
 [ 1540233 ] memory exshausted
 Bug #6844: phpDocumentor doesn\'t show classes in file
 Bug #7554: Call to undefined method ReflectionClass::hasMethod()
 Bug #7577: Notice error for undefined _pv_function_param property
 Bug #7686: phpdoc not run in dos box
 Bug #7773: "nothing parsed" error when parsing in a directory under "tutorials"
 Bug #7938: @todo does not work on include elements
 Bug #8111: Fatal error: ReflectionClass::hasProperty()
 Bug #8290: @param bug when description is on its own line
- fixed these bugs since 1.2.3.1:
 [ not entered ] phpdoc script broken on unix
 [ not entered ] XMLDocBookpeardoc2 beautifier removes comments
 [ 893186 ] HTMLframes converter sometimes misses package level docs
 [ 834941 ] inline @link doesn\'t work within <b>
 [ 839092 ] CHM:default:default produces bad links
 [ 839466 ] {$array[\'Key\']} in heredoc
 [ 840792 ] File Missing XML:DocBook/peardoc2:default "errors.tpl"
 [ 850731 ] No DocBlock template after page-level DocBlock?
 [ 850767 ] MHW Reference wrong
 [ 854321 ] web interface errors with template directory
 [ 856310 ] HTML:frames:DOM/earthli missing Class_logo.png image
 [ 865126 ] CHM files use hard paths
 [ 869803 ] bad md5sum
 [ 871764 ] @global doesn\'t work properly with whitespace after the $var
 [ 875525 ] <li> escapes <pre> and ignores paragraphs
 [ 876674 ] first line of pre and code gets left trimmed
 [ 877229 ] PHP 5 incompatibilities bork tutorial parsing
 [ 877233 ] PHP 5 incompatibilities bork docblock source highlighting
 [ 878911 ] [PHP 5 incompatibility] argv
 [ 879068 ] var arrays tripped up by comments
 [ 879151 ] HTML:frames:earthli Top row too small for IE
 [ 880070 ] PHP5 visability for member variables not working
 [ 880488 ] \'0\' file stops processing
 [ 884863 ] Multiple authors get added in wrong order.
 [ 884869 ] Wrong highligthing of object type variables
 [ 892305 ] peardoc2: summary require_once Path/File.php is PathFile.php
 [ 892306 ] peardoc2: @see of method not working
 [ 892479 ] {@link} in // comment is escaped
 [ 893470 ] __clone called directly in PackagePageElements.inc
 [ 895656 ] initialized private variables not recognized as private
 [ 896444 ] Bad line numbers
 [ 904823 ] IntermediateParser fatal error
 [ 907734 ] Exception Class is builtin to PHP5
 [ 910676 ] Fatal error: Smarty error: unable to write to $compile_dir
 [ 915770 ] Classes in file not showing
 [ 924313 ] Objec access on array
 [ 924760 ] source rendering in FireFox contains extra newlines
 [ 937235 ] duplicated /** after abstract method declaration
 [ 941146 ] Repeated sub-tutorials
 [ 944149 ] Apostrophe in DocBook name breaks DOM/earthli tree index
 [ 952217 ] HTML:frames:earthli
 [ 962319 ] Define : don\'t show the assigned value
 [ 964248 ] Convert invalid characters in package/subpackage names to _
 [ 977674 ] Parser error
 [ 986622 ] parserClass::setModifiers is incorrecrly documented
 [ 989258 ] wrong interfaces parsing
 [ 995731 ] {@internal}}-tag shows }} in HTML-doc
 [ 1016927 ] no highlight for paramtype in header of function
 [ 1043330 ] Make Command Line Parser support shorter syntax
 [ 1044486 ] duplicate parameters
 [ 1046856 ] Small filesource link bug under windows
 [ 1051941 ] private variables on same line not recognized
 [ 1081396 ] Display of inline {@link} tags with PHP functions
 [ 1090009 ] @uses doesn\'t generate @usedby link when linking to file.ext
 [ 1108018 ] Bad source code after /**#@-*/
 [ 1145403 ] Call to a member function on a non-object 
 [ 1150809 ] Infinite loop when class extends itself
 [ 1151196 ] PHP Fatal error: Cannot re-assign $this
 [ 1151650 ] UTF8 decoding for DocBook packages
 [ 1152286 ] 1.3.0RC3 - PHP5 - Smarty template doesn\'t work properly?
 [ 1152316 ] 1.3RC3 - PHP5 - HTML:frames:* - Welcome to default!=@package
 [ 1152781 ] PHP_NOTICE: Uninitialized string offset in ParserDescCleanup
 [ 1153593 ] string id="...." in tutorials
 [ 1156816 ] undeliverable email addresses for doc/tutorial authors
 [ 1164253 ] Inherited Class Constants are not displayed
 [ 1171583 ] CHM wrong filesource
 [ 1180200 ] HighlightParser does not handle Heredoc Blocks.
 [ 1202772 ] missing parentheses in Parser.inc line 946
 [ 1203445 ] Call to a member function on a non-object in Parser.inc
 [ 1203451 ] array to string conversion notice in InlineTags.inc
 [ 1223413 ] improper load sequence when using custom templatebase
 [ 1224317 ] functions refers to wrong line
 [ 1230004 ] Undefined index in class phpDocumentorTParser
 [ 1255692 ] Support for "--" argument
 [ 1261287 ] @filesource bug?
 [ 1348852 ] Call to function Convert() on a non-object + DocBlockTags
 [ 1366260 ] Default 0 parameter in method is not displayed
 [ 1373244 ] Undefined variable: root_dir in docbuilder/file_dialog.php
 [ 1380845 ] @uses tags not sorting
 [ 1391432 ] Too many underscores in include links.
 [ 1393998 ] HTMLSmartyConverter Fatal error (line 627) fix
 [ 1398977 ] @return is not merged when using DocBlock Templates
 [ 1428660 ] Confusing error when using {@link} in @uses
 [ 1456144 ] @global oddities
 [ 1459955 ] @todo tags are sorted descending instead of ascending
 [ 1462690 ] PHP Notices
 [ 1466205 ] more usedby than uses
 [ 1473272 ] Update references of phpdoc to pear-phpdoc
 [ 1481118 ] Tags with more than one attribute keep only the first one.
 [ 1485448 ] Mixing {@toc} and DOCTYPE for DocBook gives PHP fatal error
 [ 1486304 ] unexpected parameter type mixed
 [ 1490000 ] Javascript in header.tpl cause httpd log: File not found
 [ 1491119 ] Inexistant --directory leads to obscure error message
 [ 1492100 ] Warning: fread(): Length parameter must be greater than 0
 [ 1492101 ] Object of class parserLinkInlineTag could not be converted
 [ 1492538 ] ERROR: Converter X specified by ... is not a class
 [ 1492608 ] PHP Notices in current CVS
 [ 1497452 ] Fatal error: Call to undefined method parserFunction::setMo
 [ 1512969 ] Call to a member function cantSource() on a non-object
 [ 1516781 ] Use of undefined constant T_ML_COMMENT - assumed \'T_ML_COMME
 [ 1524102 ] Weird include documentation
 [ 1528752 ] Trivial typo in "phpDocumentor Inline tags" documentation
 [ 1533361 ] trailing comments stop phpdoc on source generation
 [ 1532841 ] \'%\' in function parameter default value causes errors
 [ 1540233 ] memory exshausted
- fixed these bugs reported in PEAR:
 Bug #2122: No tree menu for file identifier begining with a number
 Bug #2288: Webfrontend ignores more than one dir in "Files to ignore"
 Bug #2294: @toc tag is incompatible when XML prolog exists
 Bug #5011: PDF generation warning on uksort
 Bug #6305: array typehints break the parser
 Bug #6306: Tokenizer doesn\'t read "....<%{$key}>..." properly
 Bug #6389: Private classes are not used during grouping for class trees
 Bug #6805: Rendering bug for verbatim HTML tags
 Bug #6844: phpDocumentor doesn\'t show classes in file
 Bug #6848: Reference Patch
 Bug #6952: Update Install docs to tell correct package.xml location
 Bug #7554: Call to undefined method ReflectionClass::hasMethod()
 Bug #7577: Notice error for undefined _pv_function_param property
 Bug #7686: phpdoc not run in dos box
 Bug #7773: "nothing parsed" error when parsing in a directory under "tutorials"
 Bug #7938: @todo does not work on include elements
 Bug #8111: Fatal error: ReflectionClass::hasProperty()
 Bug #8290: @param bug when description is on its own line
';
$version = '1.3.0';
$options = array(
'baseinstalldir' => 'PhpDocumentor',
'version' => $version,
'packagedirectory' => $packagedir,
'state' => 'beta',
'filelistgenerator' => 'cvs',
'notes' => $notes,
'package' => 'PhpDocumentor',
'dir_roles' => array(
    'Documentation' => 'doc',
    'Documentation/tests' => 'test',
    'docbuilder' => 'data',
    'HTML_TreeMenu-1.1.2' => 'data',
    'tutorials' => 'doc',
    ),
'simpleoutput' => true,
'exceptions' =>
    array(
        'index.html' => 'data',
        'README' => 'doc',
        'ChangeLog' => 'doc',
        'LICENSE' => 'doc',
        'poweredbyphpdoc.gif' => 'data',
        'INSTALL' => 'doc',
        'FAQ' => 'doc',
        'Authors' => 'doc',
        'Release-1.2.0beta1' => 'doc',
        'Release-1.2.0beta2' => 'doc',
        'Release-1.2.0beta3' => 'doc',
        'Release-1.2.0rc1' => 'doc',
        'Release-1.2.0rc2' => 'doc',
        'Release-1.2.0' => 'doc',
        'Release-1.2.1' => 'doc',
        'Release-1.2.2' => 'doc',
        'Release-1.2.3' => 'doc',
        'Release-1.2.3.1' => 'doc',
        'Release-1.3.0' => 'doc',
        'pear-phpdoc' => 'script',
        'pear-phpdoc.bat' => 'script',
        'HTML_TreeMenu-1.1.2/TreeMenu.php' => 'php',
        'phpDocumentor/Smarty-2.6.0/libs/debug.tpl' => 'php',
        'new_phpdoc.php' => 'data',
        'phpdoc.php' => 'data',
        ),
'ignore' =>
    array('package.xml',
          'package2.xml',
          '*templates/PEAR/*',
          'publicweb-PEAR-1.2.1.patch.txt',
          ),
'installexceptions' => array('pear-phpdoc' => '/', 'pear-phpdoc.bat' => '/', 'scripts/makedoc.sh' => '/'),
);
$pfm2 = PEAR_PackageFileManager2::importOptions(dirname(dirname(__FILE__))
    . DIRECTORY_SEPARATOR . 'package.xml', array_merge($options, array('packagefile' => 'package.xml')));
$pfm2->setReleaseVersion($version);
$pfm2->setLicense('LGPL', 'http://www.opensource.org/licenses/lgpl-license.php');
$pfm2->setNotes($notes);
$pfm2->clearDeps();
$pfm2->setPhpDep('4.2.0');
$pfm2->setPearinstallerDep('1.4.6');
$pfm2->addPackageDepWithChannel('optional', 'XML_Beautifier', 'pear.php.net', '1.1');
$pfm2->addReplacement('pear-phpdoc', 'pear-config', '@PHP-BIN@', 'php_bin');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@PHP-BIN@', 'php_bin');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@BIN-DIR@', 'bin_dir');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@PEAR-DIR@', 'php_dir');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/includes/utilities.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/builder.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/file_dialog.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/file_dialog.php', 'pear-config', '@WEB-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/actions.php', 'pear-config', '@WEB-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/top.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/config.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/config.php', 'pear-config', '@WEB-DIR@', 'data_dir');
$pfm2->addReplacement('phpDocumentor/Setup.inc.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('phpDocumentor/Converter.inc', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('phpDocumentor/common.inc.php', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('phpDocumentor/IntermediateParser.inc', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('user/pear-makedocs.ini', 'pear-config', '@PEAR-DIR@', 'php_dir');
$pfm2->addReplacement('user/pear-makedocs.ini', 'pear-config', '@DOC-DIR@', 'doc_dir');
$pfm2->addReplacement('user/pear-makedocs.ini', 'package-info', '@VER@', 'version');
$pfm2->addRole('inc', 'php');
$pfm2->addRole('sh', 'script');
$pfm2->addUnixEol('pear-phpdoc');
$pfm2->addUnixEol('phpdoc');
$pfm2->addWindowsEol('pear-phpdoc.bat');
$pfm2->addWindowsEol('phpdoc.bat');
$pfm2->generateContents();
$pfm2->setPackageType('php');
$pfm2->addRelease();
$pfm2->setOsInstallCondition('windows');
// these next two files are only used if the archive is extracted as-is
// without installing via "pear install blah"
$pfm2->addIgnoreToRelease("phpdoc");
$pfm2->addIgnoreToRelease('phpdoc.bat');
$pfm2->addIgnoreToRelease('user/makedocs.ini');
$pfm2->addIgnoreToRelease('scripts/makedoc.sh');
$pfm2->addInstallAs('pear-phpdoc', 'phpdoc');
$pfm2->addInstallAs('pear-phpdoc.bat', 'phpdoc.bat');
$pfm2->addInstallAs('user/pear-makedocs.ini', 'user/makedocs.ini');
$pfm2->addRelease();
// these next two files are only used if the archive is extracted as-is
// without installing via "pear install blah"
$pfm2->addIgnoreToRelease("phpdoc");
$pfm2->addIgnoreToRelease('phpdoc.bat');
$pfm2->addIgnoreToRelease('user/makedocs.ini');
$pfm2->addIgnoreToRelease('pear-phpdoc.bat');
$pfm2->addInstallAs('pear-phpdoc', 'phpdoc');
$pfm2->addInstallAs('user/pear-makedocs.ini', 'user/makedocs.ini');
if (isset($_GET['make']) || (isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make')) {
    $pfm2->writePackageFile();
} else {
    $pfm2->debugPackageFile();
}
if (!isset($_GET['make']) && !(isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make')) {
    echo '<a href="' . $_SERVER['PHP_SELF'] . '?make=1">Make this file</a>';
}
?>