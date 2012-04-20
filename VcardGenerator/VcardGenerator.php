<?php

namespace Spraed\VcardBundle\VcardGenerator;

class VcardGenerator
{
    public function generateVcard(Array $fields)
    {
        $vcard = $this->transformFields($fields);

        return str_replace('\n', "\n", $vcard);
    }

    private function transformFields($fields)
    {
        // fields to content
        $content = '';
        foreach ($fields as $key => $value) {
            $content .= $key . ':' . $value . '\n';
        }

        $vcard = $this->insertContent($content);
        return $vcard;
    }

    private function insertContent($content)
    {
        $vcardContent = 'BEGIN:VCARD\n';
        $vcardContent .= 'VERSION:2.1\n';
        $vcardContent .= $content;
        $vcardContent .= 'END:VCARD\n';

        return $vcardContent;
    }
}
