<?php
namespace App\Entity;
enum TypeTransaction:string{
  CASE DEPOT = 'depot';
  CASE PAIEMENT = 'paiement';
  CASE RETRAIT = 'retrait';
}