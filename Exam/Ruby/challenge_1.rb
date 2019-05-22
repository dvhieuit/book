def FirstFactorial(num)
  return 1 if num == 1
  num * FirstFactorial(num - 1)
end
num = gets.chomp.to_i
puts FirstFactorial(num)
