<?php

namespace Spraed\VcardBundle\VcardGenerator;

class VcardGenerator
{
    public function generateVcard(Array $fields)
    {
        $vcard = $this->transformFields($fields);
        return $vcard;
    }

    private function transformFields($fields)
    {
        // fields to content
        $content = '';
        foreach ($fields as $key => $value) {
            $content .= $key . ':' . $value;
        }

        $vcard = $this->insertContent($content);
        return $vcard;
    }

    private function insertContent($content)
    {
        $vcardContent = 'BEGIN:VCARD';
        $vcardContent .= 'VERSION:3.0';
        $vcardContent .= $content;
        $vcardContent .= 'END:VCARD';

        return $vcardContent;
    }
}
