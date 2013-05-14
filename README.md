Yii-blog-sidebar
================

Sidebar widgets for Yii PHP framework. Repository includes mostCommentedPosts, recentPosts and postArchive widgets.


Requirements
================

- Yii 1.1.12
- Demo blog application which is supplied with Yii framework. The extension requires Post and Comment models from that application.

Installation
================

Copy files to extensions directory. Extensions folder is located in your application under protected folder.
If it is not present create it.

Basic usage
===============

In your view file you can render this widget like this
~~~
[php]
$this->beginWidget('ext.blogSidebar.widgetnameyouwanttorender');
~~~
