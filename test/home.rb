require "rubygems"
require "test/unit"
require "selenium-webdriver"

class HomeTest < Test::Unit::TestCase
  ADMIN_USER_NAME = 'admin@example.com'
  ADMIN_USER_PASS = 'pass' 

  def setup
    @driver = Selenium::WebDriver.for :chrome
    @wait = Selenium::WebDriver::Wait.new(timeout: 10)
  end

  # def test_home
  #   @driver.get "http://localhost:8888/"
  #   assert_equal("localhost", @driver.title)
  # end

  def input(name, value)
    @driver.find_element(:name, name).send_keys(value)

  end

  def test_login
    @driver.get "http://localhost:8888/wp-login.php"
    input("log", ADMIN_USER_NAME)
    input("pwd", ADMIN_USER_PASS)
    @driver.find_element(:id, "wp-submit").click

    @wait.until { @driver.find_element(tag_name: "h1").text == "Dashboard" }
    assert_equal("Dashboard ‹ StaticPostTypeDev — WordPress", @driver.title)
  end

  # def test_click
  #   @driver.get "http://localhost:8888"
  #   @driver.find_element(:id, 'start-button').click
  #   assert_equal("VOTE", @driver.title)
  # end
end
