<?php
/**
 * MostCommented
 * ===========
 * Yii framework extension which displays top most commented posts.
 * 
 * Example of usage:
 * In your view file you can render this widget like this
 * ~~~
 * [php]
 * $this->beginWidget('ext.blogSidebar.MostCommented');
 * ~~~
 * 
 * @license New BSD license
 * @author Aljaz Pintar
 * @version 0.1
 */
Yii::import('zii.widgets.CPortlet');

class MostCommented extends CPortlet
{
	/**
	 * @var int maximum number of posts to display. 
	 * @since 0.1
	 */
	public $commentCount = 5;
	
	/**
	 * Sets title and initializes variables
	 * 
	 * @since 0.1
	 */
	public function init()
	{
		$this->title=CHtml::encode('Most commented posts');
		parent::init();
	}
	
	/**
	 * Selects comments by post_id where post_id count is the highest.
	 * Comment status is also checked and must be STATUS_APPROVED.
	 * Query is limited by $commentCount variable
	 * 
	 * @return array Comment active records 
	 * @since 0.1
	 */
	protected function getMostCommentedPosts(){
		$criteria = new CDbCriteria;
		$criteria->alias = 'c';
		$criteria->select = 'count(c.post_id) AS number_of_comments, c.id,c.post_id';
		$criteria->condition = 'c.status = '.Comment::STATUS_APPROVED;
		$criteria->group = 'c.post_id';
		$criteria->limit = $this->commentCount;
		$criteria->order = 'number_of_comments DESC';
		//
		$result = Comment::model()->findAll($criteria);
		return $result;
	}
	
	/**
	 * Gets the most commented posts and renders mostCommented view with result passed to that view. 
	 *
	 * @since 0.1
	 */
	protected function renderContent()
	{
		$this->render('mostCommented',array('result'=>$this->getMostCommentedPosts()));
	}
}