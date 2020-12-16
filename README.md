# Magento 2 Banner-Slider (Testing)

Magento 2 Banner Slider using REST API & GraphQL

# Documentation (Not finished)

# INTRODUCTION
 This project helps adds a banner slider to home page of your magento 2
 application. ALl the required data such as slider info's and images
 comes from back-end using either REST API or GraphQL. (Will explain how to use any one of them)
 Thanks to Owl Carousel js plugin to make slider much easier to use.
 
# HOW TO :

Before you begin, make sure all these files are in proper order
 
        --code
            --Mel
                --BannerSlider
                    --Api
                        --Data
                            BannerApiInterface.php
                            BannerInterface.php
                            BannerSearchResultsInterface.php
                            SliderInterface.php
                        BannerRespositoryInterface.php
                        SlderRepositoryInterface.php
                    --Block
                        --Widget
                            Slider.php
                    --Controller
                        --Adminhtml
                            --Add
                                Index.php
                                Slider.php
                            --Delete
                                DeleteBanner.php
                                DeleteSlider.php
                            --Save
                                Save.php
                                SaveImage.php
                                SaveSlider.php
                            --View
                                Index.php
                                Sliders.php
                    --etc
                        --adminhtml
                            menu.xml
                            routes.xml
                        --frontend
                            routes.xml
                        db_schema.xml
                        di.xml
                        module.xml
                        schema.graphqls
                        webapi.xml
                        widget.xml
                    --Model
                        --Data
                            --Api
                                Banner.php
                        BannerApi.php
                        SliderApi.php
                        --Forms
                            DataProvider.php
                        --Resolver
                            Sliders.php
                        --ResourceModel
                            --Banner
                                Collection.php
                            --Slider
                                Collection.php
                            Banner.php
                            Slider.php
                        --Source
                            Slider.php
                        --Widget
                            Slider.php
                        Banner.php
                        BannerRepository.php
                        BannerSearchResults.php
                        Slider.php
                        SliderRepository.php
                    --Ui
                        --Componenet
                            --Listing
                                --Column
                                    Thumbnail.php
                                Action.php
                                SliderAction.php
                            --Slider
                                DataProvider.php
                            DataProvider.php
                    --view
                    composer.json
                    registration.php
    