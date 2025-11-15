<?php
/**	op-asset-phpdoc:/index.php
 *
 * @created   2025-10-02
 * @version   1.0
 * @package   op-asset-phpdoc
 * @author    Tomoaki Nagahara
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**	declare
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

//	...
OP()->Unit()->WebPack()->Auto('asset:/webpack/css/list.css','asset:/webpack/css/code.css');

//	...
if( file_exists('index.html') ){
	include('index.html');
	return;
}

?>
<section data-translation="true">
	<h1>Reference of the ONEPIECE Framework</h1>
	<p>
		The API reference has not been generated yet.
		To generate the reference, follow the steps below at shell environment:
	</p>
	<ul>
		<li>
			Open the terminal application.
		</li>
		<li>
			Change the directory with the following command:
			<code>cd <?= dirname(__DIR__) ?></code>
		</li>
		<li>
			Run the following command:
			<code>php ./generate.php</code>
		</li>
		<li>
			After the process is complete, reload this page.
		</li>
	</ul>
</section>
