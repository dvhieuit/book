def caesar_cipher(string, num)
  string_caesar = ''
  string.chars.each do |x| 
    if x.between?('A', 'Z')
      if (x.ord + num) > 90
        string_caesar += (x.ord + num - 90 + 64).chr
      else
        string_caesar += (x.ord + num).chr
      end
    elsif x.between?('a', 'z')
      if (x.ord + num) > 122
        string_caesar += (x.ord + num - 122 + 96).chr
      else
        string_caesar += (x.ord + num).chr
      end
    else
      string_caesar += x
    end
  end
  string_caesar
end

string = 'What a string!'
num = 5
puts caesar_cipher(string, num)
