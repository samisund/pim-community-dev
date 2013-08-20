<?php

namespace Context\Page\Channel;

use Context\Page\Base\Grid;

/**
 * Channel index page
 *
 * @author    Filips Alpe <filips@akeneo.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Index extends Grid
{
    /**
     * @var string
     */
    protected $path = '/configuration/channel/';

    /**
     * @param string $channel
     * @param string $category
     *
     * @return boolean
     */
    public function channelCanExport($channel, $category)
    {
        return $this->getElement('Grid content')->find(
            'css',
            sprintf(
                'tr:contains("%s"):contains("%s")',
                $channel,
                $category
            )
        );
    }
}
