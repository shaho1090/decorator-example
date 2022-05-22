This is a simple example of the Decorator Design Pattern. 

Thanks to Derek Banas' explanation on the link below : 

https://www.newthinktank.com/2012/09/decorator-design-pattern-tutorial/

I have created this example. 

And, I should mention another awesome resource of Design Patterns: 

https://refactoring.guru/design-patterns/decorator

In this example, I used the "Decorator Design Pattern" for ordering Pizza with a simple description and cost. You can add more functionality as you wish. But I just wanted to show you the implementation of **"Decorator Design Pattern"**. As you know I have used the Laravel framework for creating this simple app. I have created a few Feature test and Unit test as well. you can see these tests and find out how this app works. 

Another example of using the Decorator Design Pattern, which is mentioned on the Refactoring Guru website, is for sending notifications using multiple channels. I wanted to implement that example too, but later, I found a simpler and more flexible way to do that (thanks to the features of PHP). You can check it out in the "app/Services/notification" directory. 
In this way, you can choose your favorite channels and according to your selections, the proper class will be invoked and run. You can use this simple pattern in diverse setuations. 
I did not add any validation for that yet, but you can see the examples of usage in the "NotifierTest" class.

I hope this is useful for you!
