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
		'catch the Beat' => 2, // ayy lmao next level programming
		'mania' => 3
	];

	if (isset($modes[$mode]))
	{
		return $modes[$mode];
	}
	else
	{
		return false;
	}
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