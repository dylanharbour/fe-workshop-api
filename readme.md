# React Workshop
## Objectives / Goals:
* Implement a working example of a modern JS framework with Server Side Rendering
* Produce a test app for UX to engage with using various browsers (with specific focus on OMX)
* Produce a test app for SEO / Marketing to evaluate for correctness according to their requirements, and provide a springboard to discuss related issues that may come up from these implementations (e.g. Page views, DFP etc, Initial Page load content)
* Share the knowledge gained from within the verticals to the rest of the group
* Consider two types of implementations. Firstly, a full SPA (which could handle the entire FE of an App) and secondly a smaller modular implementation which could be scoped to a small section of our current apps (e.g. Listings page) and not require a change to the FE architecture of the entire app. 
* Document the best practices for each of the above implementations. 
* Recommend or rule out a JS frontend implementation based on the above. Compile enough information for ventures to be more confident in their intended direction.
* Use the gained knowledge from this process to help direct future Group Engineering or shared resource projects. E.g. Common shared components on a specific framework

## UX Intro : HomeFoodie

## API Intro
    Currently we have 3 API endpoints
    1. List / Search
    2. Detail Show 
    3. List Cities  
    
## Requirements
Build a frontend to consume the API's provided. Use the UX design as a guide for 
your implementation. Some important notes:

1. Minimal CSS should be done. Use a framework, your current stylesheets from venture or anything 
else that will allow you to not focus on the CSS. If it looks a little crappy, that's fine. 
Styling / Design is not the objective of this workshop. 

2. The entire app does not need to be built. Focus on the main features, in the sequence specified below

3. We're doing a mobile first approach. We're not worry about Desktop right now. 

4. You can choose between 2 approaches. 
* A separate SPA, sitting on a different origin.  (This is more of an ideal case)
* An integrated React module, inside the laravel project (This is more of a realistic case with where we're at)

5. Initial Focus:
* Food Details Show Page
* Food Index / Search Page
* Filtering (full screen take over)
* Server Side Rendering
* OMX Friendly
* Routing
* Modern Interactions
* Error handling / validation handling
* State Management

##Endpoints

* Menu item detail	/ show page 
    http://fe-workshop.dylanharbour.com/api/food/
* Menu Item Index / List Page
    http://fe-workshop.dylanharbour.com/api/food/1
* Pagination
	http://fe-workshop.dylanharbour.com/api/food/?page=3
* Filtering
    * Search Term  http://fe-workshop.dylanharbour.com/api/food/?city_id=3&q=chicken
    * By City http://fe-workshop.dylanharbour.com/api/food/?city_id=3
    * By Price http://fe-workshop.dylanharbour.com/api/food/?price_min=50&price_max=100
    * Number of Eaters http://fe-workshop.dylanharbour.com/api/food/?feeds_count=1
* Sorting (with direction change)
    * By City  
    http://fe-workshop.dylanharbour.com/api/food/?feeds_count=1&sort=city_id&direction=DESC
    * By Price  
    http://fe-workshop.dylanharbour.com/api/food/?sort=price&direction=ASC
    * Number of Eaters  
    http://fe-workshop.dylanharbour.com/api/food/?sort=feeds_count&direction=DESC
	
* Ignore for now:
    * Specific Styling 
    * Date / Lead time
    * Special Diets
    * Categories
    * Profile Creation
    * GeoLocation data
    * Ratings

	