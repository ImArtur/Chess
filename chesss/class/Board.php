<?php

class Board {

	CONST SIZE = 7;

	CONST  WHITE_BLOCK_CLASS = 'skin';
	CONST  BROWN_BLOCK_CLASS = 'brown';

	protected $blocks = array(
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0]
	);

	/**
	 * Output generated board to HTML
	 */
	public function render()
	{
		$htmlBoard = '<div id="board">';

		for ($row = 0; $row < self::SIZE; $row ++)
		{
			for ($col = 0; $col < self::SIZE; $col ++)
			{
				$currentNumber = $row + $col;

				$htmlBoard .= '<div class="board__block board__block--' . $this->assignCorrectEvenOddClass($currentNumber) . '">';

				if ($this->blocks[ $row ][ $col ] === 1)
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