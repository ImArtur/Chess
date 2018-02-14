<?php
/**
 * Created by Artur Kupczak.
 */

/**
 * @property int board_size
 * @property array blocks
 */

class Draw {

	CONST  WHITE_BLOCK_CLASS = 'skin';

	CONST  BROWN_BLOCK_CLASS = 'brown';

	/**
	 * Output generates board to HTML
	 */
	public function render()
	{
		$htmlBoard = '<div id="board">';

		for ($row = 0; $row < $this->board_size; $row ++)
		{
			for ($col = 0; $col < $this->board_size; $col ++)
			{
				$currentNumber = $row + $col;

				$htmlBoard .= '<div class="board__block board__block--' . $this->assignCorrectEvenOddClass($currentNumber) . '">';

				if ($this->isAlreadyOccupiedByQueen($row,$col))
				{
					$htmlBoard .= '<img src="public/img/queen.png" alt="queen" class="queen">';
				}

				$htmlBoard .= '</div>';
			}
		}
		$htmlBoard .= '</div>';

		echo $htmlBoard;
	}

	/**
	 * Method to decide if number is odd or even.
	 *
	 * @param int $total
	 *
	 * @return string
	 */
	private function assignCorrectEvenOddClass(int $total) : string
	{
		if ($total % 2 == 0)
		{
			return self::WHITE_BLOCK_CLASS;
		}

		return self::BROWN_BLOCK_CLASS;
	}
}