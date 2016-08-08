<article class="small-12 medium-12 large-12 columns eventcontainer" ng-repeat="post in posts">
	<div class="small-12 medium-12 large-3 columns calender-small">
        <p class="month">{{post.event_start_date_month}}</p>
        <p class="day">{{post.event_start_date_day}}</p>
    </div>
    <div class="small-12 medium-12 large-9 columns">
    <a href="{{post.link}}"><h2>{{post.title.rendered}}</h2></a>
	<div ng-bind-html="post.excerpt.rendered | to_trusted"></div>
	<a href="{{post.link}}">Click here to read more</a>
    </div>    
</article>
