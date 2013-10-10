#!/usr/bin/php
<?php

	$b = 0;
	$k = 0;

	for($i = 1; $i < $argc; $i++)	{
		$p = @$argv[$i];
		$v = @$argv[$i+1];
		
		if($p == "--konto")	{
			$k = $v;
		}
		
		if($p == "--blz")	{
			$b = $v;
		}
	}

	echo("IBAN: ".calculateIBAN($k, $b)."\n");


  /*****************************************************/
  /* FIND THE BEEF BELOW THIS LINE                     */
  /*****************************************************/
  

	function calculateIBAN($konto, $blz, $country = 'DE')	{
		$kto = $konto;
		$country_str = strtoupper($country);
		$iban = $country_str . str_pad(98-intval(bcmod(str_pad($blz, 8, "0", STR_PAD_LEFT).str_pad($kto, 10, "0", STR_PAD_LEFT) . strval(ord(substr($country_str, 0, 1)) - 55).strval(ord(substr($country_str, 1, 1)) - 55)."00", "97")), 2, "0", STR_PAD_LEFT) . str_pad($blz, 8, "0", STR_PAD_LEFT).str_pad($kto, 10, "0", STR_PAD_LEFT);
		return($iban);
	}
