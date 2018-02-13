<?php
require('Board.php');

class Chess extends Board {

	/**
	 * Board constructor.
	 */
	public function __construct()
	{
		$this->initiate();
	}

	/**
	 * Creating Queens
	 */
	private function initiate()
	{
		for ($y = 0; $y < 7; $y ++)
		{
			$this->createQueen(0, 0, $y);
		}
	}

	/**
	 * Method to create and check if queen can be defeated
	 * @param int $queenNumber
	 * @param int $x
	 * @param int $y
	 *
	 * @return bool
	 */
	private function createQueen(int $queenNumber,int $x ,int $y) : bool
	{

		if ($this->wontBeDefeatedOnCoordinates($x, $y))
		{
			$this->addQueenToBlock($x, $y);

			if($queenNumber === 7){
				return true;
			}

			$nextQueen = $queenNumber + 1;
			$nextCoordinate = $x+1;

			if ($this->wontBeDefeatedOnCoordinates($nextQueen, $nextCoordinate))
			{
				return true;
			}

			$this->removeQueenFromBlock($x, $y);
		}
		return false;
	}

	/**
	 * Add queen to the board on coordinates
	 * @param int $x
	 * @param int $y
	 */
	private function addQueenToBlock(int $x, int $y)
	{
		$this->blocks[ $x ][ $y ] = 1;
	}

	/**
	 * Remove queen on from the board on coordinates
	 * @param int $x
	 * @param int $y
	 */
	private function removeQueenFromBlock(int $x, int $y)
	{
		$this->blocks[ $x ][ $y ] = 0;
	}

	/**
	 * Check to see if Queen will be defeated
	 *
	 * @param int $x
	 * @param int $y
	 *
	 * @return bool
	 */
	private function wontBeDefeatedOnCoordinates(int $x, int $y) : bool
	{

		for ($i = 0; $i < $x; $i ++)
		{
			if ($this->isTakenByAnotherQueenInColumn($i, $y))
			{
				return false;
			}

			//Logic to Check if coordinates around are taken, not finished.
		}

		return true;
	}

	/**
	 * Check if block is already taken by another Queen
	 *
	 * @param $i
	 * @param $y
	 *
	 * @return bool
	 */
	private function isTakenByAnotherQueenInColumn($i, $y) : bool
	{
		return $this->blocks[ $i ][ $y ] === 1 ? true : false;
	}
}