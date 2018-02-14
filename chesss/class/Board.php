<?php
/**
 * Created by Artur Kupczak.
 */

require('Draw.php');

/**
 * @property int solved_queens
 * @property int solved_rows
 */

class Board extends Draw {

	protected $board_size = 7;

	protected $blocks = array(
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
	);

	/**
	 * Adding Queen to the board
	 *
	 * @param $column
	 */
	protected function addQueen($column)
	{
		$this->blocks[ $this->solved_queens ][ $column ] = 1;
		$this->solved_queens ++;
		$this->solved_rows ++;
	}

	/**
	 * Removing Queen from the board
	 *
	 * @param $column
	 */
	protected function removeQueen($column)
	{
		$this->solved_queens --;
		$this->solved_rows --;
		$this->blocks[ $this->solved_queens ][ $column ] = 0;
	}

	/**
	 * Decide if queen can be placed at the location
	 *
	 * @param $y
	 *
	 * @return bool
	 */
	protected function queenCanBePlacedAtTheLocation($y)
	{
		for ($i = 0; $i < $this->solved_queens; $i ++)
		{
			// test the column to check for another Queen
			if ($this->isAlreadyOccupiedByQueen($i, $y))
			{
				return false;
			}

			if($this->collideWithOtherQueenOnCrossMove($i,$y)){
				return false;
			}
		}

		return true;
	}

	/**
	 * Check if position in not already occupied by other Queen
	 *
	 * @param int $x
	 * @param int $y
	 *
	 * @return bool
	 */
	protected function isAlreadyOccupiedByQueen(int $x, int $y)
	{
		if ($this->blocks[ $x ][ $y ] === 1)
		{
			return true;
		}

		return false;
	}

	/**
	 * Detects Cross collision with another Queen
	 *
	 * @param int $x
	 * @param int $y
	 *
	 * @return bool
	 */
	private function collideWithOtherQueenOnCrossMove(int $x, int $y)
	{

		if ($this->backSlashCollision($x, $y) || $this->slashCollision($x, $y))
		{
			return true;
		}

		return false;
	}

	/**
	 *
	 * Check collision with different queen in backslash direction
	 * @param int $x
	 * @param int $y
	 *
	 * @return bool
	 */
	private function backSlashCollision(int $x, int $y)
	{
		$xNew = $this->solved_queens - 1 - $x;
		$y = $y - $x - 1 ;

		return $this->isAlreadyOccupiedByQueen($xNew,$y);
	}

	/**
	 *
	 * Check collision with different queen in slash direction
	 * @param int $x
	 * @param int $y
	 *
	 * @return bool
	 */
	private function slashCollision(int $x, int $y)
	{
		$nNew = $this->solved_queens - $x - 1;
		$y = $y + $x + 1;

		return $this->isAlreadyOccupiedByQueen($nNew,$y);
	}

}