<?php

namespace Drupal\elite_dump\DataCollector;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\webprofiler\DataCollector\DrupalDataCollectorTrait;
use Drupal\webprofiler\DrupalDataCollectorInterface;
use Symfony\Component\HttpKernel\DataCollector\DumpDataCollector as BaseDataCollector;

class DumpDataCollector extends BaseDataCollector implements DrupalDataCollectorInterface
{
    use StringTranslationTrait, DrupalDataCollectorTrait;


    /**
     * Returns the datacollector title.
     *
     * @return string
     *   The datacollector title.
     */
    public function getTitle()
    {
        return $this->t('Dump');
    }

    /**
     * Returns the collector icon in base64 format.
     *
     * @return string
     *   The collector icon.
     */
    public function getIcon()
    {
        return 'iVBORw0KGgoAAAANSUhEUgAAABUAAAAcCAYAAACOGPReAAACcUlEQVRIx+1UPUwUYRB97+Pc8ychMSaE4E+BrYWVgCd7e5dYQSxoiIFEjYWVdNiJiVjaSGFhowUkhsLEH2Jhcvsd54nYaQ0USoAYG7WBvWOfhd+R87zFC40N00z2zTdv30xmBti3/2ZBECy3+pZJgXw+f0rSiKQBkt2SOkluSFoh+SqKoplyufylJdIgCNIAJgGMkUzXcEkAEJM0DtqUNAVgwlq7Vc9hGtR1ACiSHCeZlvQGwFClUjkKYAVAexzHFyXNAkiTvEXSury/lTqFRZI9kr4DuGKtfV6L53K5tTAMu+reZwDMkuwC8F5SUFNcr3TSEf4g6dcTuvIP139ba8vGmD5JawB6Adz9o/xMJnMSwJhLvhGG4acm/T/UCBQKhc9xHA8DAMkxx/Ob1PO8UdfDD8Vi8WnCQAw1A+fn599KegbgoOd5Izukkgbc354kjZi1di4pJumx84M7pCRPO/DdXhaD5ILz3QDAXC4XATiQ8H48DMP7jWA2mx00xrxMUB3Rjcs6gE5JZ621H/ewwsdIfgOwHoZhV22klpz883spX1Kf80v1czrnwKtJidlsdnCXnl6r5zEAUK1WpwFskjwXBMFws8SkHvq+f4HkEIDN7e3tmR3SUqm06o4DADzyff9MK2X39/efMMbU5vpBqVRabVzTCUmLJNvb2tpKu5XrFPamUqkFksfd7t9pevry+XxHHMcvSPa4Hr+W9LBarVrP836mUqkjlUqlF8B1kpcBUNKiMeZSoVD4+q97eg/Azdo9lRSTNDXvsC0AUwBuN97TXS9/HMejAAbcpnQC2JC0THIuiqLppMvfsrnN27d/2y+hkCBqr75LOwAAAABJRU5ErkJggg==';
    }
}