class MyArray
  attr_reader :array

  def initialize array
    @array = array
  end

  def sum initial_value = 0
    result = initial_value
    array.each { |n| block_given? ? result += yield(n) : result += n }
    result
  end
end

my_array = MyArray.new([1, 2, 3])
puts my_array.sum(0) {|n| n ** 2}
