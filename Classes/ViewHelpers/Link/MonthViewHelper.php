<?php
/**
 * Link to the month.
 */
namespace HDNET\Calendarize\ViewHelpers\Link;

/**
 * Link to the month.
 */
class MonthViewHelper extends AbstractLinkViewHelper
{
    /**
     * Init arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('date', \DateTime::class, '', true);
        $this->registerArgument('pageUid', 'int', '', false, 0);
    }

    /**
     * Render the link to the given day.
     *
     * @return string
     */
    public function render()
    {
        $date = $this->arguments['date'];
        $additionalParams = [
            'tx_calendarize_calendar' => [
                'year' => $date->format('Y'),
                'month' => $date->format('n'),
            ],
        ];

        return parent::renderLink($this->getPageUid($this->arguments['pageUid']), $additionalParams);
    }
}
