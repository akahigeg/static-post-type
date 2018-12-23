require "rubygems"
require "test/unit"
require 'selenium-webdriver'

class HomeTest < Test::Unit::TestCase
  def setup
    @driver = Selenium::WebDriver.for :chrome
  end

  def test_home
    @driver.get "http://localhost:8888"
    assert_equal("localhost", @driver.title)
  end

  # def test_click
  #   @driver.get "http://localhost:8888"
  #   @driver.find_element(:id, 'start-button').click
  #   assert_equal("VOTE", @driver.title)
  # end
end


