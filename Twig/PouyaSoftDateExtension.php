<?php

namespace PouyaSoft\SDateBundle\Twig;

use PouyaSoft\SDateBundle\Service\jDateService;

class PouyaSoftDateExtension extends \Twig_Extension
{
    /** @var  jDateService */
    private $jDateService;

    public function __construct($jDateService)
    {
        $this->jDateService = $jDateService;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('gpDate', array($this, 'georgianToPersian')),
            new \Twig_SimpleFilter('pgDate', array($this, 'persianToGeorgian'))
        );
    }

    /**
     * @param \DateTime $gDate
     * @param string $format
     * @param string $locale (e.g. fa, fa_IR, en, en_US, en_UK, ...)
     * @param string $calendar (e.g. gregorian, persian, islamic, ...)
     * @param bool $latinizeDigit
     * @return string
     */
    public function georgianToPersian($gDate = null, $format = 'yyyy/MM/dd', $locale = 'fa', $calendar = 'persian', $latinizeDigit = true)
    {
        return $this->jDateService->georgianToPersian($gDate, $format, $locale, $calendar, $latinizeDigit);
    }

    /**
     * @param string $pDate
     * @param string $format
     * @param string $locale (e.g. fa, fa_IR, en, en_US, en_UK, ...)
     * @param string $calendar (e.g. gregorian, persian, islamic, ...)
     * @return \DateTime
     */
    public function persianToGeorgian($pDate, $format = 'yyyy/MM/dd', $locale = 'fa', $calendar = 'persian')
    {
        return $this->jDateService->persianToGeorgian($pDate, $format, $locale, $calendar);
    }

    public function getName()
    {
        return 'pouya_soft.sdate_extension';
    }
}