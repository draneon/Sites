<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{

    protected $_name = 'albums';
    
    public function getAlbum( $id ) {
        
        $id = (int)($id);
        $row = $this->fetchRow( 'id = ' . $id) ;
        
        if (! $row){
            throw new Exception("Could not fetch row $id");
        }
        
        return $row->toArray();
    }
    
    
    public function addAlbum( $artist, $title ) {
        
        $album = array (
            'artist' => $artist,
            'title' => $title
        );
        $this->insert($album);
    }
    
    
    public function updateAlbum( $id, $artist, $title ) {
        $album = array(
           'artist' => $artist,
            'title' => $title
        );
        $this->update( $album, 'id = ' . (int)$id );
    }
    
    
    public function  deleteAlbum( $id ) {
        $this.delete( 'id = ' . (int)$id );
    }


}

