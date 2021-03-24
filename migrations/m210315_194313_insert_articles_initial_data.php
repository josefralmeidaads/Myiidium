<?php

use yii\db\Migration;

/**
 * Class m210315_194313_insert_articles_initial_data
 */
class m210315_194313_insert_articles_initial_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210315_194313_insert_articles_initial_data cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->batchInsert('{{articles}}', [
            'title', 'category', 'short_description', 'author_name', 'author_email', 'content'
        ], [
            ['This is what modern PHP looks like', '1', 'The title is really pretentious, isn\'t?', 'Felipe Lopes', 'felipe@email.com.br', 'The title is really pretentious, isn’t? Yeah, it is. Although I’ve been working with PHP for years, how could I state what are the best practices and tools for the job? I couldn’t, but I’m going to do so.
            I’m seeing a real change in the way developers are doing their job with PHP, not only is the language drastically changing to become more mature and robust with new versions and improvements, but the entire ecosystem around it is changing.
            New tools, libraries, frameworks and articles are being created, patterns are being defined to make code more elegant and easy to understand. Several people are thinking about ways to make the work (and your life as a developer) more productive, clean and fun.'],

            ['Refactor Your PHP legacy Code', '1', 'Good developers are defined by the quality of their codes.', 'Mohamed Aladdin', 'aladdin@email.com.br', 'Good developers are defined by the quality of their codes. In the software industry, writing good code means saving the money that may be invested in testing, updating, extending or fixing bugs. In this article, I will show you real-life examples of some techniques and ideas that will help you to clean up your legacy code and refactor it to make it more robust and modular. These techniques will not only help you to refactor your old code but will give you great ideas as to how to write clean code from now on.'],

            ['Efficient data structures for PHP 7', '1', 'PHP has one data structure to rule them all.', 'Rudi Theunissen', 'rudi@email.com.br', 'PHP has one data structure to rule them all. The array is a complex, flexible, master-of-none, hybrid data structure, combining the behaviour of a list and a linked map. But we use it for everything, because PHP is pragmatic: "dealing with things sensibly and realistically in a way that is based on practical rather than theoretical considerations". An array gets the job done. Unfortunately, with flexibility comes complexity.
            The recent release of PHP 7 caused a lot of excitement in the PHP community. We couldn\'t wait to start using the new features and try out the reported ~2x performance boost . One of the reasons why it runs that much faster is because the array
            was redesigned . But it’s still the same structure, "optimised for everything; optimised for nothing" with room for improvement.'],

            ['The 5 Most Common Design Patterns in PHP Applications', '1', 'If you think that the number one pattern is Singleton', 'Igor Vorobiov', 'igor@email.com.br', 'You should use factories when you want to build an object. That’s right — build and not create. You don’t want to have a factory just to create a new object. When you build the object you first create it and then initialize it. Usually, it requires to perform multiple steps and apply certain logic. With that, it makes sense to have all that in one place and re-use it whenever you need to have a new object built in the same way. Basically, that’s the point of the factory pattern.
            It’s a good idea to have an interface for your factory and have your code depended on it and not on a concrete factory. With that, you can easily replace one factory with another whenever you need it.'],

            ['PHP Test Driven Development Part 1: Introduction', '1', 'Test Driven Development is a coding practice', 'Sameer Nyaupane', 'sameer@email.com.br', 'Test Driven Development is a coding practice where you write a test first then write the code to pass that test, usually in a short iterative cycle.
            Test Driven Development (TDD), was popularized by Kent Beck. TDD is one of the main techniques followed in his Extreme Programming software development methodology.
            If you would also like to check out the accompanying YouTube video, here’s the link:'],

            ['Why you should stop using Git rebase', '2', 'After using Git for several years, I found myself gradually', 'Fredrik V. Mørken', 'aladdin@email.com.br', 'After using Git for several years, I found myself gradually using more and more advanced Git commands as part of my daily workflow. Soon after I discovered Git rebase, I quickly incorporated it into my daily workflow. Those who are familiar with rebasing know how powerful a tool it is, and how tempting it is to use it all the time. However, I soon discovered that rebasing presents some challenges that are not obvious when you first start doing it. Before presenting them, I\'ll quickly recap the differences between merging and rebasing . Let\'s first consider the basic example where you want to integrate a feature branch with master. By merging, we create a new commit g that represents the merge between the two branches. The commit graph clearly shows what has happened, and we can see the contours of the "train track" graph familiar from larger Git-repos.'],

            ['How to become a Git expert', '2', 'I made a mistake in my commit, how do I fix it ?', 'Fredrik V. Mørken', 'aladdin@email.com.br', 'I made a mistake in my commit, how do I fix it ?
            My commit history is a mess, how do I make it neater?
            If you have ever had the above questions, then this post is for you. This post covers a list of topics which will make you a Git expert.
            If you do not know Git basics, click here to check out my blog on Git basics. It is necessary that you know basics of Git to make the best use of this article.'],

            ['Modern JavaScript Explained For Dinosaurs', '3', 'Learning modern JavaScript is tough if you haven\'t been', 'Peter Jang', 'peter@email.com.br', 'Learning modern JavaScript is tough if you haven\'t been there since the beginning. The ecosystem is growing and changing so rapidly that it’s hard to understand the problems that different tools are trying to solve. I started programming in 1998 but only began to learn JavaScript seriously in 2014. At the time I remember coming across Browserify and staring at its tagline:
            I pretty much didn’t understand any word in this sentence, and struggled to make sense of how this would be helpful for me as a developer.'],

            ['JavaScript Modules: A Beginner\'s Guide', '3', 'If you\'re a newcomer to JavaScript', 'Preethi Kasireddy', 'preethi@email.com.br', 'If you’re a newcomer to JavaScript, jargon like “module bundlers vs. module loaders," “Webpack vs. Browserify" and “AMD vs. CommonJS" can quickly become overwhelming.
            The JavaScript module system may be intimidating, but understanding it is vital for web developers.
            In this post, I’ll unpack these buzzwords for you in plain English (and a few code samples). I hope you find it helpful!
            Note: for simplicity’s sake, this will be divided into two sections: Part 1 will dive into explaining what modules are and why we use them. Part 2 (posted next week) will walk through what it means to bundle modules and the different ways to do so.'],

            ['The Complete JavaScript Handbook', '3', 'JavaScript is one of the most popular languages in the world', 'Flavio Copes', 'flavio@email.com.br', 'JavaScript is one of the most popular programming languages in the world, and is now widely used also outside of the browser. The rise of Node.js in the last few years unlocked back-end development - once the domain of Java, Ruby, Python, PHP, and more traditional server-side languages.
            The JavaScript Handbook follows the 80/20 rule: learn 80% of JavaScript in 20% of the time.
            Learn all you need to know about JavaScript!
            Note: you can get a PDF, ePub, or Mobi version of this handbook for easier reference, or for reading on your Kindle or tablet.']
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{articles}}');

        return false;
    }
    
}
