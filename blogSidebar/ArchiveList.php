<?php
/**
 * ArchiveList
 * ===========
 * Yii framework extension which sorts and renders blog posts by date.
 * Posts are grouped by months.
 * 
 * Example of usage:
 * In your view file you can render this widget like this
 * ~~~
 * [php]
 * $this->beginWidget('ext.blogSidebar.ArchiveList');
 * ~~~
 * 
 * @license New BSD license
 * @author Aljaz Pintar
 * @version 0.1
 */
Yii::import('zii.widgets.CPortlet');

class ArchiveList extends CPortlet
{
	/**
	 * Sets title and initializes variables
	 * 
	 * @since 0.1
	 */
	public function init()
	{
		$this->title=CHtml::encode('Archive');
		parent::init();
	}
	/**
	 * Gets all posts ordered by create_time and sorts them by year and month.
	 *  
	 * @return array posts sorted by year and month
	 * @since 0.1
	 */
	protected function getEntries(){
		$criteria = new CDbCriteria;
		$criteria->order = 'create_time DESC';
		$entries = Post::model()->findAll($criteria);
		$result = array();
		foreach($entries as $value){
			$temp=array();
			$temp['year']=date('Y',$value->create_time);
			$temp['month']=date('M',$value->create_time);
			$result[$temp['year']][$temp['month']][]= array('title'=>($value->title),'url'=>$value->getUrl());
		}
		return $result;
	}
	/**
	 * Publishes blogSidebar.js script with asset manager,
	 * collects posts by create_time and renders archive list view.
	 *  
	 * @since 0.1
	 */
	protected function renderContent()
	{
		$url = Yii::app()->assetManager->publish(Yii::getPathOfAlias('ext.blogSidebar').'/js/blogSidebar.js');
		Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_END);
		$this->render('archiveList',array('data'=>$this->getEntries()));
	}
}