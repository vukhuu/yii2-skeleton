<?php
/**
 * Execute build script
 *
 * @category Build
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

$token = 'XwBXqzyKlNaAwnzKMfPJ';
$path = realpath(dirname(__FILE__) . '/../scripts/build.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['token']) && $_GET['token'] === $token) {
    exec("php $path");
}