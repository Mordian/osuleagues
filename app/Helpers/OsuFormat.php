<?php 

function formatMode($mode)
{
	$modes = [
		'Standard',
		'Taiko',
		'Catch the Beat',
		'Mania'
	];

	return $modes[$mode];
}

function modeToInt($mode)
{
	$modes = [
		'standard' => 0,
		'taiko' => 1,
		'ctb' => 2,
		'mania' => 3
	];

	return $modes[$mode];
}

function formatRomans($number)
{
	$romans = [
		false,
		'I',
		'II',
		'III'
	];

	return $romans[$number];
}