<?php
namespace Slub\SlubWebAddressbooks\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Alexander Bigga <typo3@slub-dresden.de>, SLUB Dresden
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package slub_web_addressbooks
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class PersonController extends AbstractController
{

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\View\JsonView
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = \TYPO3\CMS\Extbase\Mvc\View\JsonView::class;

    /**
	 * action ajax
	 *
	 * @return JSON array of year strings
	 */
	public function ajaxAction()
    {

		$placeId = $this->getParametersSafely('placeId');
		$bookId = $this->getParametersSafely('bookId');
		$nameStr = $this->getParametersSafely('nameStr');

		if ($placeId > 0) {
			$selectedBooks = $this->bookRepository->findByPlaceId($placeId);

			foreach ($selectedBooks as $id => $book) {
				$selectOptions[] = $book->getYear().':'.$book->getYearString();
			}
		}

		if (is_array($selectOptions)) {
			return json_encode(array_unique($selectOptions));
        }
		else {
			return '';
        }
	}

}
