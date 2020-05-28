<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz).
 * User: jemjemzms
 * Date: 28/06/18
 * Time: 2:25 PM
*/
class Mapping extends DataObject {

    
    private static $singular_name = "Mapping";
	private static $plural_name = "Mappings";
	
	/***************************************
	 ** Properties and relationships
	 ***************************************/
	private static $db = array(
		'Fk_key' => "Enum('CategoryID, SubCategoryID')",
		"Fk_value" => "Text",
        "SV_id" => "Int"
	);

	private static $summary_fields = array (
        'Fk_key' => 'Type',
        'Fk_value' => 'ID',
        'SV_id' => 'Simpleview ID'
    );

    private static $searchable_fields = array (
        'Fk_key',
        'Fk_value',
        'SV_id'
    );  

	public function getCMSfields() {
        $fields = FieldList::create(TabSet::create('Root'));
        
        $fields->addFieldToTab('Root.Main', new DropdownField(
		  'Fk_key',
		  'Type:',
		  singleton('Mapping')->dbObject('Fk_key')->enumValues()
		));

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Fk_value', 'ID:'),
            TextField::create('SV_id', 'Simpleview ID:'),
        ));

        return $fields;
    }

}
