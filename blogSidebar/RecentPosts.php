<?php
/**
 * RecentPosts
 * ===========
 * Yii framework extension which recent posts.
 * 
 * Example of usage:
 * In your view file you can render this widget like this
 * ~~~
 * [php]
 * $this->beginWidget('ext.blogSidebar.RecentPosts');
 * ~~~
 * 
 * @license New BSD license
 * @author Aljaz Pintar
 * @version 0.1
 */

Yii::import('zii.widgets.CPortlet');

class RecentPosts extends CPortlet
{
	/**
	 * @var int maximum number of posts that we can display
	 * @since 0.1
	 */
	public $maxDisplayCount = 5;
	
	/**
	 * Sets title and initializes variables
	 * 
	 * @since 0.1
	 */
	public function init()
	{
		$this->title=CHtml::encode('Recent posts');
		parent::init();
	}
	
	/**
	 * Performs a query which selects all posts which have status published.
	 * Number of rows returned is limited by $maxDisplayCount variable.
	 * Query is ordered by create_time in descending order.
	 *  
	 * @return array post CActiveRecords.
	 * @since 0.1
	 */
	protected function getRecentPosts(){
		$criteria = new CDbCriteria();
		$criteria->order = 'create_time DESC';
		$criteria->condition = 'status = '.Post::STATUS_PUBLISHED;
		$criteria->limit = $this->maxDisplayCount;
		$result = Post::model()->findAll($criteria);
		return $result;
	}
	
	/**
	 * Gets recent posts via function and renders results in a recentPosts view.  
	 *
	 * @since 0.1
	 */
	protected function renderContent()
	{
		$this->render('recentPosts',array('result'=>$this->getRecentPosts()));
	}
}