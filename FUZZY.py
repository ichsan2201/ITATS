def fuzzy_membership(value, a, b, c):
    if value <= a or value >= c:
        return 0
    elif a < value <= b:
        return (value - a) / (b - a)
    elif b < value < c:
        return (c - value) / (c - b)
    return 0


def infer_comfort_level(temp):
    cold = fuzzy_membership(temp, 0, 0, 20)
    moderate = fuzzy_membership(temp, 15, 25, 35)
    hot = fuzzy_membership(temp, 30, 40, 40)

    comfort_cold = cold * 100
    comfort_moderate = moderate * 70
    comfort_hot = hot * 30

    total_membership = cold + moderate + hot
    if total_membership == 0:
        return "Tidak terdefinisi (suhu di luar rentang)"

    comfort_score = (comfort_cold + comfort_moderate + comfort_hot) / total_membership

    if comfort_score > 80:
        return f"Sangat Nyaman ({comfort_score:.2f}%)"
    elif comfort_score > 50:
        return f"Nyaman ({comfort_score:.2f}%)"
    else:
        return f"Tidak Nyaman ({comfort_score:.2f}%)"

temperature = float(input("Masukkan suhu (°C): "))
comfort = infer_comfort_level(temperature)
print(f"Tingkat kenyamanan: {comfort}")
