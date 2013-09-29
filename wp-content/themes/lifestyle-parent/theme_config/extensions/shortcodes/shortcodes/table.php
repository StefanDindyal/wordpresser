<?php

/**
 * Table
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * class: custom css class
 */

function tfuse_table($atts, $content)
{
    extract(shortcode_atts(array('class' => ''), $atts));

    $tfuse_shortcode_arr['content'] = html_entity_decode(do_shortcode($content));

    return '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-price">' . html_entity_decode(do_shortcode($content)) . '</table>';
}

$atts = array(
    'name' => 'Table',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 7,
    'options' => array(
         /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'Enter table content',
            'id' => 'tf_shc_table_content',
            'value' => '  <thead>
                  <tr class="even">
                    <td class="first" width="150"><span class="text-gray"><em>COLUMN 1</em></span></td>
                    <td width="140"><span class="text-green">COLUMN 2</span></td>
                    <td width="140"><span class="text-yellow">COLUMN 3</span></td>
                    <td width="140" class="last"><span class="text-blue">COLUMN 4</span></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Feature 1</td>
                    <td>Insert your text</td>
                    <td>Insert your text</td>
                    <td>Insert your text</td>
                  </tr>
                  <tr class="even">
                    <td>Feature 2</td>
                    <td>Insert your text</td>
                    <td>Insert your text</td>
                    <td>Insert your text</td>
                  </tr>
                  <tr>
                    <td>Feature 3</td>
                    <td>Insert your text</td>
                    <td>Insert your text</td>
                    <td>Insert your text</td>
                  </tr>
                  </tbody>',
            'type' => 'textarea'

        )
    )
);

tf_add_shortcode('table', 'tfuse_table', $atts);
