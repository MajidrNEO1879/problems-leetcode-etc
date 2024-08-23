import numpy as np

# Define the original matrix
A = np.array([
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
])

# Define the rotation angle (90 degrees clockwise)
theta = 90  # degrees

# Convert theta to radians for numpy trigonometric functions
theta_rad = np.radians(theta)

# Define the rotation matrix for 90 degrees clockwise around the z-axis
R_z = np.array([
    [np.cos(theta_rad), np.sin(theta_rad), 0],
    [-np.sin(theta_rad), np.cos(theta_rad), 0],
    [0, 0, 1]
])

# Rotate the matrix
A_rotated = R_z @ A  # Use @ for matrix multiplication in NumPy

print("Original Matrix:")
print(A)

print("\nRotated Matrix (90 degrees clockwise):")
print(A_rotated)

