<?php

namespace PHPfriends\SimplePdf\Example;

include __DIR__.'/../../vendor/autoload.php';

use PHPfriends\SimplePdf\Main\LowLevelPdf;
use PHPfriends\SimplePdf\LowLevelParts\Box;
use PHPfriends\SimplePdf\LowLevelParts\Content;
use PHPfriends\SimplePdf\LowLevelParts\FontDict;
use PHPfriends\SimplePdf\LowLevelParts\PageNode;
use PHPfriends\SimplePdf\LowLevelParts\PagesNode;
use PHPfriends\SimplePdf\LowLevelParts\ResourceNode;

class Example1 extends AbstractExample
{
    protected $pdf;

    public function process()
    {
        $pdf = new LowLevelPdf();

        $pdf->setMetadataInfo('Author', '@PHPfriendsTK');
        $pdf->setMetadataInfo('Creator', 'https://github.com/PHPfriends/simple-pdf');

        $helveticaFont = new FontDict('F1', FontDict::TYPE1, FontDict::HELVETICA);
        $pdf->addObject($helveticaFont);

        $resources = new ResourceNode();
        $resources->addFont($helveticaFont);
        $pdf->addObject($resources);

        $pages = new PagesNode();
        $pdf->addObject($pages);

        # page 1

        $content1 = new Content();
        $content1->addText(0,100,$helveticaFont,18,'Cum exerci facete apeirian eu. Soluta graeci posidonium nam id, id qui omittam aliquando. Veritus pertinacia persequeris vix et. Erroribus necessitatibus id duo, fugit petentium sea ea, dolore appareat fabellas ne sit. Has sumo eirmod honestatis ut, pro graeci tincidunt in. Vitae maiestatis cu sea.');
        $content1->addText(0,200,$helveticaFont,18,'Veritus pertinacia persequeris vix et. Erroribus necessitatibus id duo, fugit petentium sea ea, dolore appareat fabellas ne sit. Has sumo eirmod honestatis ut, pro graeci tincidunt in. Vitae maiestatis cu sea.');
        $pdf->addObject($content1);

        $page1 = new PageNode($pages, $resources, new Box(0, 0, 612, 792));
        $page1->setContents($content1);
        $pdf->addObject($page1);

        # page 2

        $content2 = new Content();
        $content2->addText(0,500,$helveticaFont,38,'Goodbye!');
        $pdf->addObject($content2);

        $page2 = new PageNode($pages, $resources, new Box(0, 0, 612, 792));
        $page2->setContents($content2);
        $pdf->addObject($page2);

        $pdf->saveToFile(__DIR__.'/test.pdf');
    }
}

Example1::main();
